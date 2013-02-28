


App.Views.User=Backbone.View.extend({
    
    events:{
        "submit form#usereditform":"updateinfo"
    },
    
    updateinfo:function(e){
        
        var userdetails={
            firstname:$("#firstname").val(),
            laststname:$("#lastname").val(),
            about:$("#about").val()
        };
        
        this.model.save(userdetails,{success:this.handlesavesuccess,error:this.handlesaveerror});
        e.preventDefault();
    },
    
    handlesavesuccess:function(){
       alert("edited ");
    },
    
    handlesaveerror:function(){
      alert("something went wrong");
    },
    initialize:function(){
       
        self=this;
        this.model.fetch().then(function(data){
           if(data){
              
             self.render();
              
           }
           
        });
    },
        
    render:function(){
       this.$el.html(this.template(this.model.toJSON()));
       return this;
      
    },
    
   template:_.template($("#useredittemplate").html())
    
});


