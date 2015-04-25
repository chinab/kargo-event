# Introduction #

Directions for getting Kargo-Event running on your computer..

# Details #

First, using Subversion, check out the project using the directions on this page: http://code.google.com/p/kargo-event/source/checkout

Next, make sure you have libevent 1.4.9. get it from:
http://monkey.org/~provos/libevent-1.4.9-stable.tar.gz (located on this page: http://monkey.org/~provos/libevent/)

The next step is patching libevent 1.4.9 with the patch file available at /patches/bb\_libevent\_http\_verbs.patch. In the 'libevent-1.4.9-stable' directory type:

```

patch -i path/to/kargo-event/patches/bb_libevent_http_verbs.patch
```

After you've done that, in the patched libevent directory type:
```

./configure
sudo make install
```

Now, go into the kargo-event directory and type:
```

phpize
./configure --enable-debug
make
make test
sudo make install
```
(take note of where it says the shared extensions are installed - for me it says: Installing shared extensions:     /usr/local/lib/php/extensions/no-debug-non-zts-20060613/)

Now edit your php.ini file to include that directory - if you don't know where your php.ini file is type
```

php -i |grep .ini
```

Edit the extension\_dir property to include the directory that it said when you did sudo make install.
for example, my php.ini file says:
```

; Directory in which the loadable extensions (modules) reside.
extension_dir = "/usr/local/lib/php/extensions/no-debug-non-zts-20060613/"
```

That's it! You've done it! Now try one of the demos such as zf or zf-apiserver.

Notes:
  * Ensure that there is a softlink pointing to the Zend Framework in the /library directory of the specific demo you are trying - if you don't have the Zend Framework on your machine, you can get it from http://framework.zend.com
  * Also, make sure that you've created the proper db and permissions for the demo, as well as set up the db using the sql file in /deploy