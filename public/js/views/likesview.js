 var App=App || {};
  
App.Views.PhotoLikes=Backbone.View.extend({
 
    el:"#userphotolikes",
    
    
    
    events:{
        
        "click a.like":"likephoto",
        "click a.unlike":"unlikephoto"
    },

    likephoto:function(e)
    {
       
        e.preventDefault();
       this.findusermodel();
    },
    
    unlikephoto:function(e)
    {
          e.preventDefault();
          var model=this.findusermodel();
          
          if(model)
          {
              var self=this;
               model.destroy().then(function(){
                   self.renderAll();
               });
               
          }
         
         
          //this.collmodelection.remove(model);
          
          
          

    },
        
    findusermodel:function(){ 
      var userid=parseInt(this.userid,10);
      return this.collection.find(function(model){          
          return model.get("userid")===userid;
      });
    },
    
    initialize:function(options)
    { 
        //this.collection.on("remove",this.renderAll,this);
        this.userid=options.userid;  
        this.userphotoarea=this.$("#userlikemain");
        this.renderAll();
        if(this.userid){ this.appendlikelink();}
         
       //this.collection.on("reset",this.renderAll,this);
       
    },
    
    appendlikelink:function()
    {
        var result=this.checklike();
        if(result<1)
          var link=this.createlikelink();
        else
          var link=this.createunlikelink();      
      
        this.$el.prepend(link);
    },
        
    checklike:function()
    {
       
      return this.collection.youlike();
    },
    
    createlikelink:function()
    {
        return $("<a>",{href:"#",class:"like userlikesec",text:"like"});
    },
        
    createunlikelink:function()
    {
        return $("<a>",{href:"#",class:"unlike userlikesec",text:"unlike"});
    },
        
    render:function()
    {
        return this; 
    },
        
    renderAll:function()
    {  
        this.userphotoarea.empty();
        this.collection.each(this.addOne,this);    
    },
     
   
        
    addOne:function(like)
    {        
      var view=new App.Views.likeview({model:like});
      this.userphotoarea.append(view.render().el);
      
    }
   
   
    
});








