 //objects hold more datatypes

 var info = {
full_ame : "Daniel Ochoa",
title : "staff Person",
links : [
  { blog : "danielochoa.com"},
  { twitter: "http twitter.com"}
]
};

//functino as property of an object
var calc = {
  status : 'awesome',
  plus : function (a,b) {
    return ( 
        console.log(this),
        console.log(a+b),
        console.log(arguments),
        console.log(this.status)
      )
  }
}

//function declairation
function plus(a,b) {
  return('a+b');
}
plus(2,2);

//definition expression
var plusA = function (a,b) {
  return console.log(a+b);
}(2,2);
//or could call like below.
//plus(2,2);
//good to use when executed immediatly.
//function needs to be called or invoked.
//function, methods, construtors or call/apply methods.
//arguments and this
//invodking stops current execution
//traditional invocation plus(a,b)

function plusB(a,b) {
  return (
    console.log(a+b),
    console.log(this),
    console.log(arguments)
    )
}



