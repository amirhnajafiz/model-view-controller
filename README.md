<p align="center">
    <img src="/public/assets/demo.png" width="700" />
</p>

<br />

Implementing simple Model View Controller website with PHP.
This is the base of a MVC project. All routes and models and controllers are already setupt.
Just clone the project and use it.

## How to use?

This project will build a basic website based on MVC.
To customize it, first install composer.

Clone the project by:

```shell
git clone https://github.com/amirhnajafiz/PHP-MVC.git
```

Enter the main dir:

```shell
cd Basic-MVC
```

Update the composer for vendor creation:

```shell 
composer update
```

All good, if you want to rename the package, go to <b>composer.json</b> and change the settings and update
the composer again.

Now you are good to create your controllers and models.<br />
You have to set the database configurations in <b>/models/Database.php</b> .<br />

And finaly run the server by the following command:
```shell
php -S 127.0.0.1:8080 -t public
```

All done.
