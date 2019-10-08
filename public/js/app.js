/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/babel-loader/lib/index.js):\nSyntaxError: /home/vagrant/foodCloudApp/resources/js/app.js: Support for the experimental syntax 'classProperties' isn't currently enabled (14:14):\n\n\u001b[0m \u001b[90m 12 | \u001b[39m    }\u001b[0m\n\u001b[0m \u001b[90m 13 | \u001b[39m\u001b[0m\n\u001b[0m\u001b[31m\u001b[1m>\u001b[22m\u001b[39m\u001b[90m 14 | \u001b[39m    ajaxCall \u001b[33m=\u001b[39m (url) \u001b[33m=>\u001b[39m {\u001b[0m\n\u001b[0m \u001b[90m    | \u001b[39m             \u001b[31m\u001b[1m^\u001b[22m\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 15 | \u001b[39m        $\u001b[33m.\u001b[39majax({ url\u001b[33m:\u001b[39m url\u001b[33m,\u001b[39m success\u001b[33m:\u001b[39m \u001b[36mthis\u001b[39m\u001b[33m.\u001b[39msuccessCallBack\u001b[33m,\u001b[39m error\u001b[33m:\u001b[39m \u001b[36mthis\u001b[39m\u001b[33m.\u001b[39mfailCallBack })\u001b[33m;\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 16 | \u001b[39m    }\u001b[33m;\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 17 | \u001b[39m\u001b[0m\n\nAdd @babel/plugin-proposal-class-properties (https://git.io/vb4SL) to the 'plugins' section of your Babel config to enable transformation.\n    at Parser.raise (/home/vagrant/foodCloudApp/node_modules/@babel/parser/lib/index.js:6400:17)\n    at Parser.expectPlugin (/home/vagrant/foodCloudApp/node_modules/@babel/parser/lib/index.js:7733:18)\n    at Parser.parseClassProperty (/home/vagrant/foodCloudApp/node_modules/@babel/parser/lib/index.js:10933:12)\n    at Parser.pushClassProperty (/home/vagrant/foodCloudApp/node_modules/@babel/parser/lib/index.js:10898:30)\n    at Parser.parseClassMemberWithIsStatic (/home/vagrant/foodCloudApp/node_modules/@babel/parser/lib/index.js:10837:14)\n    at Parser.parseClassMember (/home/vagrant/foodCloudApp/node_modules/@babel/parser/lib/index.js:10771:10)\n    at /home/vagrant/foodCloudApp/node_modules/@babel/parser/lib/index.js:10726:14\n    at Parser.withTopicForbiddingContext (/home/vagrant/foodCloudApp/node_modules/@babel/parser/lib/index.js:9805:14)\n    at Parser.parseClassBody (/home/vagrant/foodCloudApp/node_modules/@babel/parser/lib/index.js:10703:10)\n    at Parser.parseClass (/home/vagrant/foodCloudApp/node_modules/@babel/parser/lib/index.js:10677:22)\n    at Parser.parseStatementContent (/home/vagrant/foodCloudApp/node_modules/@babel/parser/lib/index.js:9974:21)\n    at Parser.parseStatement (/home/vagrant/foodCloudApp/node_modules/@babel/parser/lib/index.js:9932:17)\n    at Parser.parseBlockOrModuleBlockBody (/home/vagrant/foodCloudApp/node_modules/@babel/parser/lib/index.js:10508:25)\n    at Parser.parseBlockBody (/home/vagrant/foodCloudApp/node_modules/@babel/parser/lib/index.js:10495:10)\n    at Parser.parseTopLevel (/home/vagrant/foodCloudApp/node_modules/@babel/parser/lib/index.js:9861:10)\n    at Parser.parse (/home/vagrant/foodCloudApp/node_modules/@babel/parser/lib/index.js:11373:17)\n    at parse (/home/vagrant/foodCloudApp/node_modules/@babel/parser/lib/index.js:11409:38)\n    at parser (/home/vagrant/foodCloudApp/node_modules/@babel/core/lib/transformation/normalize-file.js:168:34)\n    at normalizeFile (/home/vagrant/foodCloudApp/node_modules/@babel/core/lib/transformation/normalize-file.js:102:11)\n    at runSync (/home/vagrant/foodCloudApp/node_modules/@babel/core/lib/transformation/index.js:44:43)\n    at runAsync (/home/vagrant/foodCloudApp/node_modules/@babel/core/lib/transformation/index.js:35:14)\n    at /home/vagrant/foodCloudApp/node_modules/@babel/core/lib/transform.js:34:34\n    at processTicksAndRejections (internal/process/task_queues.js:72:11)");

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /home/vagrant/foodCloudApp/resources/js/app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! /home/vagrant/foodCloudApp/resources/sass/app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });