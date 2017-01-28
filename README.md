[![Donate](https://img.shields.io/badge/Donate-PayPal-green.svg)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=J79X6ZMJHRMLC)

## WBC_Importer Extension - One Click Demo Importer ##
One Click Multi Demo Content Importer Extension for [ReduxFramework](https://github.com/ReduxFramework/redux-framework)

For issues or questions please post in [issues](https://github.com/Webcreations907/WBC-Importer-extension/issues) here and __not__ on Reduxframework issue tracker. Thanks :smile:

This is a modified version of [Radium Importer](https://github.com/FrankM1/radium-one-click-demo-install) to work as a extension for ReduxFramework and support multiple demo imports.

##### Preview Image #####
![alt tag](https://cloud.githubusercontent.com/assets/8421576/5591231/263fdfce-90fc-11e4-8d45-8631349bd375.jpg)

## Steps ##
__1__- Download code from this repo, unzip and place ```wbc_importer``` folder into your Redux [extensions directory](http://reduxframework.com/docs/extensions-loader/ "Redux Documentation"). 
_After this you should see the demo importer load in your Theme Options panel with a few examples showing._

__2__- Inside ```wbc_importer/demo-data/``` create a demo content folder. IE __demo1__, __demo2__, __etc__. 

__3__- Create ```content.xml``` file by exporting your WordPress content using the WordPress's export function __tools > export__

__4__- _(optional)_ Create a ```widgets.txt``` file using [Widget Importer & Exporter](https://wordpress.org/plugins/widget-importer-exporter/) plugin. It will export as ```.wie``` file, just rename file to ```widgets.txt```

__5__- _(optional)_ Create ```theme-options.txt``` file, get content from your __Import/Export__ of your Redux panel.

__6__- Create a ```320x240``` screenshot image called ```screen-image.jpg```, supports .png,.gif as well.

__7__- __That's All!__ Repeat steps __2-6__ for each demo content set/import you want.

### Example Functions/Filters. ###
Check [example-functions.php](https://github.com/Webcreations907/WBC-Importer-extension/blob/master/example-functions.php) file from this repo which also contains a example of how import RevSlider, Set Menus, and Set Home Page.

### Show Some Love ###
Promoting the people that made this extension possible. :)

__FrankM1__: 
- [Radium Themes](http://themes.radiumthemes.com/)

__ReduxFramework__: 
- [Redux Premium Extensions](http://reduxframework.com/extensions/) 
- [Donate to the ReduxFramework](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=MMFMHWUPKHKPW "Donate via Paypal")
