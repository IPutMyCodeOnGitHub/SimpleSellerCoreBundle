Simple Seller Core Bundle
========================

Installation
============

Step 1: Download the Bundle
---------------------------

Update your composer.json:

```
"require": {
    ... ,
    "simpleseller/core-bundle" : "dev-master"
},
"repositories" : [{
    "type" : "vcs",
    "url" : "https://github.com/nikolay-nikitin/SimpleSellerCoreBundle.git"
}, ...],
```

Then:

```bash
$ composer simpleseller/core-bundle
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter] (https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.


Step 2: Enable the bundle
-------------------------

Enable the bundle by adding it to the list of registered bundles in the `app/AppKernel.php` file of your project:

```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...

            new \SimpleSeller\CoreBundle\SimpleSellerCoreBundle(),
        );

        // ...
    }

    // ...
}
```


Step 3: Update database schema
-------------------------

Core entities `Product` and `Category` can be used for now in your project. 
You can generate corresponding migrations for them, write fixtures, etc.  