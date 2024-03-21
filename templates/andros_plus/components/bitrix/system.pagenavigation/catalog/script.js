$(function () {
    if (!window.top.projectAPI) {
        window.top.projectAPI = {};
    }
    if (window.top.projectAPI.paginationInited == true) {
        return;
    }

    $(document).on('click', '.pager__more', function () {
        var $this = $(this);
        var pagination = $this.closest('.pagination-wraper');
        var list = $(pagination.data('target'));
		
        $this.prop('disabled', true);
        $this.find('.fic').addClass('fa-spin').addClass('loader').removeClass('fic-refresh');
        $.ajax({
            url: $this.data('href'),
            success: function (page) {
                var $page = $(page);
                list.append($page.find(pagination.data('target')).html());
                pagination.html($page.find('#' + pagination.attr('id')).html());
                history.pushState({}, '', $this.data('href'));
                emitGlobalEvent("OnDocumentHtmlChanged");
            },
            complete: function () {
                $this.find('.fic').removeClass('fa-spin').removeClass('loader').addClass('fic-refresh');
                $this.prop('disabled', false);
            }
        });
    });
	


    $(document).on('click', '.pager__more', function(){
		
		var targetContainer = $('.js-items'),          //  Контейнер, в котором хранятся элементы
		 productsGrid = $('.section--pager');       //  Контейнер, в котором хранятся элементы
            url =  $('.pager__more').attr('data-href');    //  URL, из которого будем брать элементы
		var pagination = $('.section--pager .section__content');
        var list = $(pagination.data('target'));
		
        if (url !== undefined) {
            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'html',
                success: function(data){

                    //  Удаляем старую навигацию
                    $('.section--pager .pager__more').remove();

                    var elements = $(data).find('.js-item'),  //  Ищем элементы
                        pagination = $(data).find('.container.section__content');//  Ищем навигацию
pagination.addClass('rrrr');
                    targetContainer.append(elements);   //  Добавляем посты в конец контейнера
					
                    productsGrid.html(pagination); //  добавляем навигацию следом
                    
                    sectionSwiper = new Swiper(".js-item .swiper", {
                        pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                        },
                        lazy: true
                    });
                }
            })
        }

    });



    window.top.projectAPI.paginationInited = true;
});