
set :symfony_env_prod,  "dev"
set :user,              "root"
set :domain,            ""
set :deploy_to,         "/home/sites_internet/#{domain}"
set :current_path,      "/home/sites_internet/#{domain}/current"

server '', :app, :web, :primary => true
