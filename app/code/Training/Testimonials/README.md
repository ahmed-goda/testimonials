# Magento 2 Customer Testimonials Custom Module

[![N|Solid](https://cldup.com/dTxpPi9lDf.thumb.png)](https://nodesource.com/products/nsolid)

Customer Testimonials is a hand tailored module designed on some of the hottest opensource technologies such as Magento 2 CMS, that could be developed easily in simple level.

  - [Requirements][RL1]
  - [Installation][IL1]
  - [Troubleshooting][TL1]
  - [License][LL1]

# Requirements:

- PHP >= 7.1.0
- Magento >= 2.3 Installed
- MySQL Server version 5.7.23 or higher
    -  or MariaDB version 10.2.7 or higher.
- Composer: 1.6.5 or higher.
- SERVER: Apache 2 or NGINX.


# Installation & Configuration :

- Step 1: Get the code - Download the repository
    Download and unzip the respective extension zip and create Training(vendor) and Testimonials(module) name folder inside your magento/app/code/ directory and then move all module's files into magento root directory Magento2/app/code/Training/Testimonials/ directory.

- Step 2: Run following command via terminal from magento root directory
    Navigate to the root directory of the project you cloned or downloaded then execute these commands below as in their order:
    ```sh
    $ php bin/magento setup:upgrade
    $ php bin/magento setup:di:compile
    ```
    => Flush the cache and reindex all.
    and Hola!, the module now is properly installed.

Log in as admin to find a new menu add to the sidebar under the name Testimonials from which you can manage the module.
Navigate to System menu then Data Transfer Section and finally Import to access the drop down list from where you can upload the offline collated data. 

### Troubleshooting
Site loading very slow?
```sh
    $ php bin/magento setup:di:compile
    $ php bin/magento cache:clean
```

### License

This is free software distributed under the terms of the MIT license.

[//]: # (These are reference links used in the body of this note and get stripped out when the markdown processor does its job. There is no need to format nicely because it shouldn't be seen. Thanks SO - http://stackoverflow.com/questions/4823468/store-comments-in-markdown-syntax)


   [RL1]: <https://github.com/ahmadSaeedGoda/simple-blog#Requirements>
   [IL1]: <https://github.com/ahmadSaeedGoda/simple-blog#Installation>
   [TL1]: <https://github.com/ahmadSaeedGoda/simple-blog#Troubleshooting>
   [LL1]: <https://github.com/ahmadSaeedGoda/simple-blog#License>
   [LMDL1]: <https://github.com/ahmadSaeedGoda/simple-blog/blob/master/LICENSE.md>