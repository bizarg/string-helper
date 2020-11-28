# string-helper

StringHelper::camelCase('camel_case'); //camelCase
StringHelper::upperCaseCamelCase('first_upper_camel_case'); //FirstUpperCamelCase
StringHelper::toUnderscore('FirstUpperCamelCase'); //first_upper_camel_case
StringHelper::toGlue('first_upper_camel_case', '-'); //first-upper-camel-case
StringHelper::toHyphen('first_upper_camel_case'); //first-upper-camel-case
StringHelper::match('first_upper_camel_case'); //['first', 'upper', 'camel', 'case']
StringHelper::match('FirstUpperCamelCase'); //['First', 'Upper', 'Camel','Case']
