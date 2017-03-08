<?php
// app/appKernel.php
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            /* FosUser */
            new FOS\UserBundle\FOSUserBundle(),
            /* Sonata Admin */
            new Sonata\CoreBundle\SonataCoreBundle(),
            new Sonata\BlockBundle\SonataBlockBundle(),
            new Sonata\AdminBundle\SonataAdminBundle(),
            new Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle(),
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new JMS\SerializerBundle\JMSSerializerBundle(),
            /* Sonata Media */
            new Sonata\MediaBundle\SonataMediaBundle(),
            /* DoctrineExtension */
            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
            /* JmsI18nRouting */
            new JMS\I18nRoutingBundle\JMSI18nRoutingBundle(),
            new JMS\TranslationBundle\JMSTranslationBundle(),
            /* Translation */
            new Sizannia\TranslationBundle\SizanniaTranslationBundle(),
            /* Editor */
            new Sizannia\EditorBundle\SizanniaEditorBundle(),
            new Sizannia\JqueryToolsBundle\SizanniaJqueryToolsBundle(),
            /* Pagination */
            new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
            /* Own Bundle */
            new Altaway\UserBundle\AltawayUserBundle(),
            new Altaway\OfferBundle\AltawayOfferBundle(),
            new Altaway\PageBundle\AltawayPageBundle(),
            new Altaway\MediaBundle\AltawayMediaBundle(),
            new Altaway\AdminBundle\AltawayAdminBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            $bundles[] = new Sonata\EasyExtendsBundle\SonataEasyExtendsBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }

    public function boot()
    {
        parent::boot();

        if (false === $this->debug) {
            $handler = ErrorHandler::register();

            $handler->throwAt(0, true);
            $handler->scopeAt(0, true);
            $handler->traceAt(E_ALL, true);

            $logger = $this->container->get('monolog.looger.php_error');
            $handler->setDefaultLogger($logger);
        }
    }
}
