$(document).ready(function(){$(".offer-wrapper").slick({slidesToShow:1,slidesToScroll:1,arrows:false,dots:true,fade:false,autoplay:false,autoplaySpeed:4000,asNavFor:".photo-wrapper",});$(".photo-wrapper").slick({slidesToShow:1,slidesToScroll:1,asNavFor:".offer-wrapper",dots:false,arrows:false,infinite:true,speed:500,fade:false,cssEase:"linear",centerMode:false,focusOnSelect:false,});$(".slider-wrapper").slick({infinite:true,dots:false,slidesToShow:1,slidesToScroll:1,arrows:true,responsive:[{breakpoint:992,settings:{arrows:false,},},],});});$(document).ready(function(){$(".categories-wrapper").each(function(){let ths=$(this);ths.find("#menu-categories > li > a").click(function(){ths.find("#menu-categories > li > a").removeClass("active").eq($(this).index()).addClass("active");}).eq(0).addClass("active");});});$(document).ready(function(){$(".size-wrapper").each(function(){let ths=$(this);ths.find(".size__item").click(function(){ths.find(".size__item").removeClass("active").eq($(this).index()).addClass("active");}).eq(0).addClass("active");});});$(document).ready(function(){$(".color-wrapper").each(function(){let ths=$(this);ths.find(".color__item").click(function(){ths.find(".color__item").removeClass("active").eq($(this).index()).addClass("active");}).eq(0).addClass("active");});});$(document).ready(function(){$(".hamburger").on("click",function(){$(".hamburger__menu").toggleClass("active");$(".hamburger").toggleClass("active");});});$(document).ready(function(){$(".arrow-down").click(function(){var el=$(this).attr("href");$("body, html").animate({scrollTop:$(el).offset().top+"px"},"show");return false;});});$(window).on("scroll load resize",function(){var pixelTop=$(window).scrollTop();if(pixelTop>0&&$(document).width()>998){$(".header").addClass("active");$("body#bodyAll").addClass("scroll");console.log("body");}else if(pixelTop<1){$(".header").removeClass("active");$("body#bodyAll").removeClass("scroll");}});$(window).on("scroll load resize",function(){var pixelTop=$(window).scrollTop();if(pixelTop>832&&$(document).width()>998){$(".header-main").addClass("active");$("body#bodyMain").addClass("scroll-main");}else if(pixelTop<832){$(".header-main").removeClass("active");$("body#bodyMain").removeClass("scroll-main");}});let btnOpen=document.getElementById("tel__logo");let modal=document.getElementById("wrapper-modal");let overlay=document.getElementById("overlay");let overlayValid=document.getElementById("overlay__valid");let btnClose=document.getElementById("btn-close");let body=document.body;btnOpen.addEventListener("click",function(){modal.classList.add("active");body.classList.add("active");});function closeModal(){modal.classList.remove("active");body.classList.remove("active");}
overlay.addEventListener("click",closeModal);overlayValid.addEventListener("click",closeModal);btnClose.addEventListener("click",closeModal);$(document).ready(function(){$.validator.addMethod("regex",function(value,element,regexp){var re=new RegExp(regexp);return this.optional(element)||re.test(value);});$(".js-form").validate({rules:{name:{required:true,},tel:{required:true,regex:"^([+]+)*[0-9\x20\x28\x29-]{5,20}$",},email:{required:true,email:true,},},messages:{name:"Пожалуйста, введите Ваше имя",tel:{required:"Пожалуйста, введите корректный номер телефона",},email:{required:"Пожалуйста, введите корректный e-mail",},},submitHandler:function(form){$(".js-form").submit(function(e){var form_data=$(this).serialize();$.ajax({type:"POST",url:"send2.php",data:form_data,success:function(){console.log(form_data);},error:function(response){console.log("нет");},});});},});});$(document).ready(function(){$.validator.addMethod("regex",function(value,element,regexp){var re=new RegExp(regexp);return this.optional(element)||re.test(value);});$(".contact-form").validate({rules:{name:{required:true,},tel:{required:true,regex:"^([+]+)*[0-9\x20\x28\x29-]{5,20}$",},email:{required:true,email:true,},message:{required:true,},},messages:{name:"Пожалуйста, введите Ваше имя",tel:{required:"Пожалуйста, введите корректный номер телефона",},email:{required:"Пожалуйста, введите корректный e-mail",},message:{required:"Пожалуйста, введите сообщение",},},submitHandler:function(form2){$(".contact-form").submit(function(e){var form_data_cont=$(this).serialize();$.ajax({type:"POST",url:"/send-contact.php",data:form_data_cont,success:function(){$('.message-success').fadeIn('show');console.log("yes");},error:function(response2){console.log("нет");},});});},});});