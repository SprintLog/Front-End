

#### Config Webpack
add dependencies
```javascript
"babel-cli": "^6.24.1",
"babel-core": "^6.25.0",
"babel-loader": "^7.1.2",
"babel-plugin-transform-class-properties": "^6.24.1",
"babel-plugin-transform-object-rest-spread": "^6.23.0",
"babel-preset-env": "^1.5.2",
"babel-preset-es2015": "^6.24.1",
"babel-preset-react": "^6.24.1",
"css-loader": "^0.28.4",
"firebase": "^4.7.0",
"jest": "^21.2.1",
"live-server": "^1.2.0",
"node-sass": "^4.5.3",
"normalize.css": "^7.0.0",
```
then

```
npm i --save babel-preset-es2015 babel-preset-react
```

 webpack.config.js, in the
 ```bash
loader: query: {presets: ['es2015', 'react'] }
 ```
