
const fs = require('fs');
const Guid = require('guid');
const express = require('express');
const bodyParser = require("body-parser");
const Mustache  = require('mustache');
const Request  = require('request');
const Querystring  = require('querystring');
const app = express();

app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());
  
var csrf_guid = Guid.raw();
const account_kit_api_version = '{{15}}';
const app_id = '{{446795225724682}}';
const app_secret = '{{7e0ccd0ada8aefee5abc75a8726714b2}}';
const me_endpoint_base_url = 'https://graph.accountkit.com/{{15}}/me';
const token_exchange_base_url = 'https://graph.accountkit.com/{{15}}/access_token'; 

function loadLogin() {
  return fs.readFileSync('dist/login.html').toString();
}

app.get('/', function(request, response){
  var view = {
    appId: app_id,
    csrf: csrf_guid,
    version: account_kit_api_version,
  };

  var html = Mustache.to_html(loadLogin(), view);
  response.send(html);
});

app.listen(process.env.PORT);

    