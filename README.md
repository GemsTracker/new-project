# GemsTracker new project

GemsTracker (GEneric Medical Survey Tracker) is a software package for (complex) distribution of questionnaires and forms during clinical research and quality registrations in healthcare.

This is the GemsTracker quickstart project. You can use it together with the documentation on [GemsTracker.org](https://gemstracker.org) to have a quick start. Check out the [Demo website](https://gemstracker.org/demo/) to give the software a try without even installing it!

## Installation
To install the new-project, download a zip of the [latest release](https://github.com/GemsTracker/new-project/releases/latest) and use [composer](https://getcomposer.org/) to get the needed dependencies.

```bash
$ composer install --no-dev
```

At the moment the setup script will not run as a post-install step using composer because it needs user input. We will fix that in the future, but for now you need to manually run the setup script to tell how you would like to name your project and how to connect to the database.

```bash
$ vendor/bin/phing -f scripts/setup.xml
```

If you have not already done so, you should now create an empty database and give access to the user script you provided. When running the software (by going to htdocs/index.php) you can login the application using the username and password `superadmin`.

From this point on you can develop your own modules or make changes to the configuration files in `application/configs/project.ini`