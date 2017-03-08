<?php


namespace Altaway\AdminBundle\Command;

use Altaway\OfferBundle\Entity\Offer;
use Altaway\PageBundle\Entity\Page;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FakerCommand extends ContainerAwareCommand
{
    /**
     * @var \Faker\Factory
     */
    private $faker;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    /**
     * @var array
     */
    private $locales;

    /**
     * @var string
     */
    private $defaultLocale;

    /**
     * @var SymfonyStyle
     */
    private $output;

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName('altaway:faker');
        $this->setDescription('Add Fake data');
    }

    /**
     *
     */
    private function offerFaker()
    {
        $this->output->writeln(str_repeat("=", 20));
        $offers = array();
        foreach ($this->locales as $locale)
        {
            for ($i = 0; $i < 15; $i++)
            {
                $entity = new Offer();
                $entity->setTitle($this->faker->text(50));
                $entity->setShortTitle($this->faker->text(25));
                $entity->setIsEnable($this->faker->boolean);
                $entity->setBody($this->faker->text);
                $entity->setPublishAt($this->faker->dateTime);
                $entity->setLocation($this->faker->streetAddress);
                $entity->setLanguage($locale);
                $entity->setReference(($locale == $this->defaultLocale) ? NULL : $offers[$this->defaultLocale][$i]);
                $entity->setSector($this->faker->text(25));
                $this->em->persist($entity);
                $offers[$locale][$i] = $entity;

            }
            $this->em->flush();
            $this->output->success(sprintf('Initialisation of offers in %s', $locale));
        }
        $this->em->flush();
    }

    /**
     *
     */
    private function pageFaker()
    {
        $pages = array();
        $this->output->writeln(str_repeat("=", 20));
        foreach ($this->locales as $locale)
        {
            for ($i = 0; $i < 7; $i++)
            {
                $entity = new Page();
                $entity->setTitle($this->faker->text(50));
                $entity->setBody($this->faker->paragraph(150));
                $entity->setLanguage($locale);
                $entity->setRank($i);
                $entity->setSubtitle($this->faker->text(25));
                $entity->setReference(($locale == $this->defaultLocale) ? NULL : $pages[$this->defaultLocale][$i]);
                $this->em->persist($entity);
                $pages[$locale][$i] = $entity;
            }
            $this->em->flush();
            $this->output->success(sprintf('Initialisation of pages in %s', $locale));
        }
        $this->em->flush();
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->output = new SymfonyStyle($input, $output);
        $this->faker = $faker = \Faker\Factory::create();
        $this->em = $this->getContainer()->get('doctrine')->getManager();
        $this->defaultLocale = $this->getContainer()->getParameter('jms_i18n_routing.default_locale');
        $this->locales = $this->getContainer()->getParameter('jms_i18n_routing.locales');
        if(($key = array_search($this->defaultLocale, $this->locales)) !== false)
        {
            unset($this->locales[$key]);
        }
        array_unshift($this->locales, $this->defaultLocale);
        $this->offerFaker();
        $this->pageFaker();
    }
}