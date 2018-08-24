/**
 * Welcome to your Workbox-powered service worker!
 *
 * You'll need to register this file in your web app and you should
 * disable HTTP caching for this file too.
 * See https://goo.gl/nhQhGp
 *
 * The rest of the code is auto-generated. Please don't update this file
 * directly; instead, make changes to your Workbox build configuration
 * and re-run your build process.
 * See https://goo.gl/2aRDsh
 */

importScripts("https://storage.googleapis.com/workbox-cdn/releases/3.3.0/workbox-sw.js");

/**
 * The workboxSW.precacheAndRoute() method efficiently caches and responds to
 * requests for URLs in the manifest.
 * See https://goo.gl/S9QRab
 */
self.__precacheManifest = [
  {
    "url": "404.html",
    "revision": "9c879fc993746ee4567e0a956a5eae47"
  },
  {
    "url": "activate-1.jpg",
    "revision": "f17d3503e2a2d58cf5097a1e1730acfe"
  },
  {
    "url": "activate-2.jpg",
    "revision": "7d3642b956bd5501f7e048b4eff3ea0c"
  },
  {
    "url": "activate-3.jpg",
    "revision": "646237deb5796400e7ec8b27ccb79bab"
  },
  {
    "url": "activate-4.jpg",
    "revision": "b7fcedcc11b90f1f274a9362aa2c3371"
  },
  {
    "url": "activate-5.jpg",
    "revision": "05601c8f0646fe088565329958a8ff3d"
  },
  {
    "url": "assets/css/3.styles.e7ebd8f1.css",
    "revision": "388d5a11c7aa17f8fe96c4a562d4798f"
  },
  {
    "url": "assets/img/search.83621669.svg",
    "revision": "83621669651b9a3d4bf64d1a670ad856"
  },
  {
    "url": "assets/js/0.fa5a1182.js",
    "revision": "5e49061ca7999f314391621c4ff6d6a7"
  },
  {
    "url": "assets/js/1.7b757e66.js",
    "revision": "1386fd4ab6fe08e5309f9e877a24746a"
  },
  {
    "url": "assets/js/2.1fad6271.js",
    "revision": "09b5e8ee57595964e1667b3fc7c49f48"
  },
  {
    "url": "assets/js/app.d9db8df8.js",
    "revision": "78c70cef8c52fbb668cc58ae286df38a"
  },
  {
    "url": "config/index.html",
    "revision": "661efdad00e44eba6f8567de0a26749f"
  },
  {
    "url": "icons/android-chrome-192x192.png",
    "revision": "b655395b66beb82d4278b2b7e3e4373f"
  },
  {
    "url": "icons/android-chrome-512x512.png",
    "revision": "3b3d8aa31b94a8f6c4748521c8c5e356"
  },
  {
    "url": "icons/apple-touch-icon-152x152.png",
    "revision": "4bdaa22ba018868c38cf72db8c5dcc75"
  },
  {
    "url": "icons/msapplication-icon-144x144.png",
    "revision": "32fecf60eb2c19dc8332731ae13062da"
  },
  {
    "url": "icons/safari-pinned-tab.svg",
    "revision": "dbbe7872794546cd1e3628b058843d41"
  },
  {
    "url": "import-1.jpg",
    "revision": "4be68e4c163764b896bdb25a5251cc76"
  },
  {
    "url": "import-2.jpg",
    "revision": "e03e83d698fe9371dec1a6bff9aeaeb2"
  },
  {
    "url": "import-3.jpg",
    "revision": "08a3df3aaf9c63779ed5c1dc7c2dda11"
  },
  {
    "url": "import-4.jpg",
    "revision": "46db3587e730d2c0329296aed98a7b81"
  },
  {
    "url": "index.html",
    "revision": "addea77fecc4e4a8a875a3e39e5bb54a"
  },
  {
    "url": "install-1.jpg",
    "revision": "9098590711a51d466111b174aff063b2"
  },
  {
    "url": "install-2.jpg",
    "revision": "b9ff65b2807a2ab98ad58536cd897bdd"
  },
  {
    "url": "install-3.jpg",
    "revision": "10840446ad84b98d3463b3769a24098d"
  },
  {
    "url": "install-4.jpg",
    "revision": "204bac4460cf8b5d53ba9861c50046d1"
  },
  {
    "url": "logo.png",
    "revision": "3b3d8aa31b94a8f6c4748521c8c5e356"
  },
  {
    "url": "screenshot.jpg",
    "revision": "8d77e1815944e841267de0403b6eb401"
  },
  {
    "url": "setup/index.html",
    "revision": "2af9ded417a82a79a4e1c28a32dab0a8"
  }
].concat(self.__precacheManifest || []);
workbox.precaching.suppressWarnings();
workbox.precaching.precacheAndRoute(self.__precacheManifest, {});
