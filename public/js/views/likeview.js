
var App= App || {} ;

App.Views.likeview=Backbone.View.extend({
    
    initialize:function()
    {
        this.model.on("destroy",this.remove,this);
        
    },
       
            
    events:{
      "mouseover a":"handlemouseover"
    },
        
    handlemouseover:function()
    {
        console.log(this.$el);
    },
        
    remove:function()
    {
        
        this.$el.remove();
    },
    
    render:function()
    {
        this.$el.html(this.template(this.model.toJSON()));
        return this;
    },
        
    template:_.template($("#likestemplate").html())
    
    
});

/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


