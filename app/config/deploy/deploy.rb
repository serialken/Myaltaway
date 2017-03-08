set :stage_dir,         "app/config/deploy"
set :stages,            %w(production developpement)
set :default_stage,     "developpement"

set :application,       ""

set :interactive_mode,  false
set :copy_vendors,      true

set :app_path,          "app"
set :log_path,          app_path + "/logs"
set :cache_path,        app_path + "/cache"
set :session_path,      app_path + "/sessions"
set :symfony_console,   app_path + "/console"
set :symfony_vendors,   "vendor"
set :build_bootstrap,   "ventor-front"

ssh_options[:forward_agent] = true
default_run_options[:pty] = true

set :scm,               :git
set :repository,        ""
#set :branch do
#    default_tag = `git tag`.split("\n").last
#    tag = Capistrano::CLI.ui.ask "Tag to deploy (make sure to push the tag first): [#{default_tag}] "
#    tag = default_tag if tag.empty?
#    tag
#end
set :branch,            "master"

set :deploy_via,        :remote_cache

set :model_manager,     "doctrine"

set  :use_sudo,         true
set  :keep_releases,    3

# Be more verbose by uncommenting the following line
#logger.level = Logger::MAX_LEVEL

set :shared_files,          ["app/config/parameters.yml"]
set :shared_children,       [log_path, session_path, web_path + "/uploads"]
set :use_composer,          true
set :writable_dirs,         [cache_path, log_path, session_path, web_path + "/uploads"]
set :webserver_user,        "www-data"
set :permission_method,     :chown
set :use_set_permissions,   true
set :copy_vendors,          true
set :dump_assetic_assets,   false
set :webserver,             "apache2"

before 'symfony:cache:warmup',    'npm:install'
before 'symfony:cache:warmup',    'bower:install'
after  'bower:install',           'grunt:deploy'

#after "deploy",                   "webserver:restart"
#after "deploy",                   "php5-fpm:restart"
after "deploy",                   "deploy:cleanup"

namespace :bower do
    desc 'Install bower dependencies'
    task :install, :roles => :web, :except => { :no_release => true } do
    capifony_pretty_print "--> Install bower dependencies"
    run "cd #{latest_release} && #{try_sudo} bower install --allow-root --quiet"
    capifony_puts_ok
    end
end

namespace :grunt do
    desc 'Run Grunt command'
    task :deploy, :roles => :web, :except => { :no_release => true } do
        capifony_pretty_print "--> Run Grunt command"
        run "cd #{latest_release} && grunt deploy"
        capifony_puts_ok
    end
end

namespace :webserver do
    desc 'Restart Web server'
    task :restart, :roles => :web, :except => { :no_release => true } do
        capifony_pretty_print "--> Restart Web server"
        run "service #{webserver} restart"
        capifony_puts_ok
    end
end

namespace :php5-fpm do
    desc 'Restart php5-fpm'
    task :restart, :roles => :web, :except => { :no_release => true } do
        capifony_pretty_print "--> Restart php5-fpm"
        run "service php5-fpm restart"
        capifony_puts_ok
    end
end

require 'capistrano/ext/multistage'