# Introduction
This is a documentation file for **Comment System** project. Here you will find step by step guide on how to install **Comment System** and get it running. Also,the project structure is explained in depth.

### Video Demo

Just in case, there may be problems in configuring on local machine, created a video demo on youtube.
[YouTube](https://www.youtube.com/watch?v=hrwlw68xTmY)

### Installation

1. Copy all the files into your web server root folder.
2. Open **DbConnection.php** file under **config** folder.
3. Change `$username`, `$password`, `$host`, `$databaseName` and `$port` varilable values according you your **mysql** server parameters.
4. Make sure that your **mysql** server is up and running.
5. Execute **database-dump.sql** file under your **mysql** server. This will create tables and insert some default values so that you can quickly have the notion of how it works.
6. Open the local server url on your browser. In my case, it's **localhost:8888**
7. Done!

### Project Structure
Project consists of the following folders and root files.

**assets** this folder contains all the resources file, css,js etc.

**config** this folder contains configuration files. So far there is only one file.

**DbConnection.php** file. This file keeps the configuration for dabatabase connection.

**fixtures** this folder contains only one file, this file has the all the database table configration , default data.

**model** this folder contains models like `Post` and `Comment` which are the main building blocks of our system, *Comment System*. Also it contains `PostQuery` and `CommentQuery` classes.

**post** this folder contains **new post**, **new comment** php files.

**session** this folder contains all the siles related to **session** work.

**utils** this is a general purpose folder for keeping **general purpose** functions, helpers.

**views** this folder contains most of the **partial** files which are used inside some other php files.


## Final Thoughts.

Of course, this projects source code can be improved, and the project structure changed. By adding **autoloading** features **namespacing** principle can be applied to remove all the `require_once`, `include_once`. In that case code becomes both less error prone and less in quantity with more **quality standard**.

Fina,lly I used **bootstrap** to layout quickly. I could have done all it myself, but it would take more time. And I used **jQuery** and **jQuery Widget Factory** to abstract **dom** manipulation and **ajax** request creation. I could of course used low level dom manipulation and xmlhttprequest api. I hope, I was not allowed to use third party libraries and frameworks on backend only. If needed, I am ready to rewrite frontend layout and javascript code in pure javascript anytime.