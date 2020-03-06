fbuilderjQuery = (typeof fbuilderjQuery != 'undefined' ) ? fbuilderjQuery : jQuery;
fbuilderjQuery[ 'fbuilder' ] = fbuilderjQuery[ 'fbuilder' ] || {};
fbuilderjQuery[ 'fbuilder' ][ 'modules' ] = fbuilderjQuery[ 'fbuilder' ][ 'modules' ] || {};

fbuilderjQuery[ 'fbuilder' ][ 'modules' ][ 'url' ] = {
	'tutorial' : 'https://cff.dwbooster.com/documentation#url-module',
	'toolbars'		: {
		'processing' : {
			'label' : 'URLs and Parameters',
			'buttons' : [
							{
								"value" : "getURL",
								"code" : "getURL()",
								"tip" : "<p>Returns the current URL. <strong>getURL()</strong></p>"
							},
							{
								"value" : "getBaseURL",
								"code" : "getBaseURL()",
								"tip" : "<p>Returns the base URL of the current page. <strong>getBaseURL()</strong></p>"
							},
							{
								"value" : "getURLParameters",
								"code" : "getURLParameters()",
								"tip" : "<p>Returns a plain object with the URLs parameters. The operation accepts an URL as optional parameter. <strong>getURLParameters()</strong></p>"
							},
							{
								"value" : "getURLParameter",
								"code" : "getURLParameter(",
								"tip" : "<p>Returns the value of an URL parameter. The operation accepts two parameters: the parameter name and the dafault value. The default value would be returned if the URL parameter does not exist. If not default value is passed as parameter, and the URL parameter does not exist, the operation returns null. <strong>getURLParameter(parameter_name, default_value)</strong> the default_value is optional.</p>"
							},
							{
								"value" : "redirectToURL",
								"code" : "redirectToURL(",
								"tip" : "<p>Redirects the user. The operation accepts two parameters: the URL and a plain object for the parameters. <strong>redirectToURL(url, object)</strong> the object is optional.</p>"
							},

						]
		}
	}
};