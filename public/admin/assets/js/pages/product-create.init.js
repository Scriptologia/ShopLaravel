/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************************************!*\
  !*** ./resources/js/pages/ecommerce-product-create.init.js ***!
  \*************************************************************/
/*
Template Name: Velzon - Admin & Dashboard Template
Author: Themesbrand
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: Ecommerce product create Js File
*/
// ckeditor
//     ксли создаем продукт , то чистим хранилище от редактирования
    if(routes.product.create === window.location.href) sessionStorage.removeItem('editInputValue');
    var myEditor = [];
    // получаем массив файлов (их url от папки) на удаление
    var filesToRemove = [], fileMain;

// Dropzone
var dropzonePreviewNode = document.querySelector("#dropzone-preview-list");
dropzonePreviewNode.itemid = "";

var previewTemplate = dropzonePreviewNode.parentNode.innerHTML;
dropzonePreviewNode.parentNode.removeChild(dropzonePreviewNode);

var dropzone = new Dropzone(".dropzone", {
  url: '#',
  method: "post",
  previewTemplate: previewTemplate,
  previewsContainer: "#dropzone-preview",
    uploadMultiple:true,
    paramName: "images",
    autoProcessQueue: false,
}); // Form Event

(function () {
  'use strict'; // Fetch all the forms we want to apply custom Bootstrap validation styles to
    let formData = new FormData();

  var forms = document.querySelectorAll('.needs-validation'); // date & time

  var date = new Date().toUTCString().slice(5, 16);

  function currentTime() {
    var ampm = new Date().getHours() >= 12 ? "PM" : "AM";
    var hour = new Date().getHours() > 12 ? new Date().getHours() % 12 : new Date().getHours();
    var minute = new Date().getMinutes() < 10 ? "0" + new Date().getMinutes() : new Date().getMinutes();

    if (hour < 10) {
      return "0" + hour + ":" + minute + " " + ampm;
    } else {
      return hour + ":" + minute + " " + ampm;
    }
  }

  setInterval(currentTime, 1000); // product image

  document.querySelector("#product-image-input").addEventListener("change", function () {
      var preview = document.querySelector("#product-img");
      var file = document.querySelector("#product-image-input").files[0];

    var reader = new FileReader();
    reader.addEventListener("load", function () {
      preview.src = reader.result;
    }, false);

    if (file) {
        formData.append('fileMain', file);
        reader.readAsDataURL(file);
    }
  });
  // choices category input
  var prdoctCategoryInput = new Choices('#choices-category-input', {
    searchEnabled: false
  });
  var publishStatusInput = new Choices('#choices-publish-status-input', {
    searchEnabled: false
  });
  var publishVisibleInput = new Choices('#choices-publish-visibility-input', {
    searchEnabled: false
  });
    var effectsInput = new Choices('#product-effects-input', { searchEnabled: false });
   var tags = $(".js-example-disabled-multi").select2().val(null).trigger("change");
var priceInput = $("#product-price-input").mask("999999.99");
var discountInput = $("#product-discount-input").mask("999.99");
var discountEnableInput = $("#discount-enable");
    var editinputValueJson = sessionStorage.getItem('editInputValue');
    var keywordsInput = [];

    // первичная загрузка всех продуктов
  if (editinputValueJson) {
    var editinputValueJson = JSON.parse(editinputValueJson);
    axios.get(routes.apiProduct.edit + '/' + editinputValueJson.id).then(function(resp) {
        // заполнение дропзоны картинками с сервера
        editinputValueJson = resp.data.data;console.log(editinputValueJson.images)
        if(editinputValueJson.images){
            for(let i = 0; i < editinputValueJson.images.length; i++) {
                dropzone.displayExistingFile({name: editinputValueJson.images[i]}, imgURL +editinputValueJson.images[i])
            }
        }
        dropzone.on("removedfile", function(file){
            filesToRemove.push(file.name)
        });

    $("#formAction").val("edit") ;
    $("#product-id-input").val(editinputValueJson.id);
    $("#plant-type-input").val(editinputValueJson.plant_type);
    $("#product-img").attr('src', imgURL + editinputValueJson.img_main);

    langs.forEach(function(it) {
        let trans = editinputValueJson.translations[it]? editinputValueJson.translations[it] : editinputValueJson.translations.en;
        $(`#${it} .product-title-input`).val(trans.name);
        $(`#${it} .product-title-seo`).val(trans.title_seo);
        $(`#${it} .product-description-seo`).val(trans.description_seo);
        keywordsInput[it] = new Choices(`#${it} .meta-keywords-input`, { searchEnabled: false });
        keywordsInput[it].setValue(trans.keywords.split(','))
        ClassicEditor.create(document.querySelector(`#${it} .ckeditor-classic`)).then(editor => {
            editor.ui.view.editable.element.style.height = '200px';
            myEditor[it] = editor;
            myEditor[it].setData(trans.description)
        })["catch"](function (error) {
            console.error(error);
        })
    })

    $("#sku-input").val(editinputValueJson.sku);
    priceInput.val((editinputValueJson.price / 100).toFixed(2));
    $("#orders-input").val(editinputValueJson.orders);
        discountEnableInput.prop('checked', editinputValueJson.discount_enable)
     discountInput.val((editinputValueJson.discount / 100).toFixed(2));
    $("#product-effects-input").val(editinputValueJson.effects);
      let itemsId = editinputValueJson.tags.map(it => it.id);
    tags.select2().val(itemsId).trigger("change") ;
    prdoctCategoryInput.setChoiceByValue(editinputValueJson.category.id+'');
      var deleted_at = editinputValueJson.deleted_at ? 1 : 0;
        effectsInput.setValue(editinputValueJson.effects.split(','))
      publishStatusInput.setChoiceByValue(deleted_at +'');
      publishVisibleInput.setChoiceByValue(editinputValueJson.is_published+'');
    })
        .catch( err => {
            if(err.response)
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: err.response.data.message,
                showConfirmButton: false,
                timer: false,
                showCloseButton: true
            });
        })
  }
    else {
      langs.forEach(function(it) {
          keywordsInput[it] = new Choices(`#${it} .meta-keywords-input`, { searchEnabled: false });
          ClassicEditor.create(document.querySelector(`#${it} .ckeditor-classic`)).then(editor => {
              editor.ui.view.editable.element.style.height = '200px';
              myEditor[it] = editor;
          })["catch"](function (error) {
              console.error(error);
          })
      })
  }

// обновление или сохранение на сервере
  Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener('submit', function (event) {
        event.preventDefault();
      if (!form.checkValidity()) {
        event.stopPropagation();
      } else {
        var plantTypeValue = $("#plant-type-input").val();
        var prdoctCategoryValue = prdoctCategoryInput.getValue(true) * 1;
        var publishStatusValue = publishStatusInput.getValue(true) * 1;
        var publishVisibleValue = publishVisibleInput.getValue(true) * 1;
        var skuInputValue = $("#sku-input").val() * 1;
        var orderValue = $("#orders-input").val();
        var productPriceValue = priceInput.val() * 100;
         var productImageValue = editinputValueJson?  editinputValueJson.img_main : productImageValue = '';
        var formAction = $("#formAction").val();
        var tagsSelected = tags.select2('data');
          var discountValue = discountInput.val();
          var effectsValue = $("#product-effects-input").val();
          var discountEnable = discountEnableInput.prop('checked');
          var discountValue = discountInput.val() * 100;

          var newObj = {
              "img_main": productImageValue,
              "plant_type": plantTypeValue,
              "category_id": prdoctCategoryValue,
              "sku": skuInputValue,
              "price": productPriceValue,
              "tags" : tagsSelected,
              "discount" : discountValue,
              "discount_enable" : discountEnable,
              "effects" : effectsValue,
              "deleted_at" : publishStatusValue,
              "is_published" : publishVisibleValue,
          };

          langs.forEach(function(it) {
              newObj[it] = {}
              newObj[it].name = $(`#${it} .product-title-input`).val()? $(`#${it} .product-title-input`).val() : $(`#${lang_main} .product-title-input`).val();
              newObj[it].keywords = keywordsInput[it].getValue(true).join(',')?keywordsInput[it].getValue(true).join(',') :keywordsInput[lang_main].getValue(true).join(',')
              newObj[it].description = myEditor[it].getData() ? myEditor[it].getData() : myEditor[lang_main].getData();
              newObj[it].description_seo = $(`#${it} .product-description-seo`).val() ? $(`#${it} .product-description-seo`).val() : $(`#${lang_main} .product-description-seo`).val();
              newObj[it].title_seo = $(`#${it} .product-title-seo`).val() ? $(`#${it} .product-title-seo`).val() : $(`#${lang_main} .product-title-seo`).val();
          })

        if (formAction == "add") {
            sendToServer(null, newObj)
        } else if (formAction == "edit") {
              sendToServer(editinputValueJson.id, newObj)
        } else {
          console.log('Form Action Not Found.');
        }

        // window.location.replace("products");
        return false;
      }

      form.classList.add('was-validated');
    }, false);
  });

  function sendToServer(productItemID, newObj){
      let id = '';
      if(productItemID) id = '/' + productItemID;
      for(let i = 0; i < dropzone.getQueuedFiles().length; i++) {
          formData.append(`files[${i}]`, dropzone.getQueuedFiles()[i] )
      }
      formData.append('filesToRemove', JSON.stringify(filesToRemove) )

      formData.append('newObj', JSON.stringify(newObj) )

      axios.post(routes.apiProduct.update + id, formData)
          .then( response => {
              if (sessionStorage.getItem('editInputValue')) {
                  sessionStorage.setItem('editInputValue', JSON.stringify(response.data.data));
              }
              window.location.href = routes.product.all;
          })
          .catch( err => {
              Swal.fire({
                  position: 'center',
                  icon: 'error',
                  title: err.response.data.message,
                  showConfirmButton: false,
                  timer: false,
                  showCloseButton: true
              });
          })
      // удаление данных
      formData.delete('filesToRemove')
      formData.delete('newObj')
      for(let i = 0; i < dropzone.getQueuedFiles().length; i++) {
          formData.delete(`files[${i}]`)
      }
  }

})();

/******/ })()
;