(function(){
  
  var app = angular.module('store',[]);
  
  app.controller('StoreController',function(){
    this.products = gems;
                 });
 
  ///////panels/////////////
  /*app.controller('PanelController',function(){
    this.tab = 1;
    
    this.selectTab = function(setTab){
      this.tab=setTab;
    }
    this.isSelected = function(checkTab){
      return this.tab === checkTab;
    }
    
  });*/
  
  ////////////////////review form//////////////////
  app.controller('ReviewController',function(){
    this.review = {};
    
   this.addReview = function(product){
     product.reviews.push(this.review);
     this.review = {};
   };
    
  });
  
  ///////////////////////////////////////directives//////////////////////////////////////////////////////
  app.directive('productInfo',function(){

    return{
      restrict:'E',
      templateUrl:'product_info.html'
    };
    
  });
  
  app.directive('productPanels',function(){

    return{
      restrict:'E',
      templateUrl:'product_panels.html',
      controller:function(){
      
         this.tab = 1;
    
    this.selectTab = function(setTab){
      this.tab=setTab;
    }
    this.isSelected = function(checkTab){
      return this.tab === checkTab;
    }
    
  
        
    },
      
      controllerAs:'panels'
     
    };
  });
  
 
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
   var gems = [
  {
    name:'sarani',
    price: 2,
    description:'xxxxxxx',
    canPurchase: false,
    images: [
      {
      full:'images/1.JPG',
      thumb:'images/2.JPG'
      },
      {
      full:'images/3.JPG',
      thumb:'images/4.JPG'
      }
    ],
    reviews:[
      {
        stars:5,
        body:'ffffffffffffffffffff',
        author:'aaaaaaaaaa'
      },
      {
        stars:3,
        body:'ddddddddddddddd',
        author:'wwwwwwwwwwwwww'
      }      
    ],
  },
  {
    name:'sarani1',
    price: 2.95,
    description:'xxxxxxx1',
    canPurchase: true,
    images: [
      {
      full:'images/1.JPG',
      thumb:'images/2.JPG'
      },
      {
      full:'images/3.JPG',
      thumb:'images/4.JPG'
      }
    ],
    reviews:[
      {
        stars:5,
        body:'ffffffffffffffffffff',
        author:'aaaaaaaaaa'
      },
      {
        stars:3,
        body:'ddddddddddddddd',
        author:'wwwwwwwwwwwwww'
      }      
    ],
  }
  
  ];
  
})();