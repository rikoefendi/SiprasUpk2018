$(document).ready(function() {
        $('.validate').focus(function() {
            $(this).parent().addClass('is-active');
            $('div.is-active > .prefix').addClass('active');
        });
        $('.validate').focusout(function(){
            if($(this).val() === ''){
                $('div.is-active > .prefix').removeClass('active');
                $(this).parent().removeClass('is-active');

            }
        });

                // remove all .active classes when clicked anywhere
        var hide = true;
        // $('.dropdown a').each(function(i) {
            $('.dropdown a').focus(function() {
                var targetData = $(this).parent().attr('data-target');
                var id         = $('#'+targetData);
                id.addClass('dropdown-active');
            });
            $('.dropdown a').focusout(function() {
                var targetData = $(this).parent().attr('data-target');
                var id         = $('#'+targetData);
                id.removeClass('dropdown-active');
            });

            $('textarea').on('keyup',function(){
        		$(this).css('height','auto');
        		$(this).height(this.scrollHeight);
        	});

            $(document).on('change', '.file-field input[type="file"]', function () {
                  var file_field = $(this).closest('.file-field');
                  var path_input = file_field.find('input.file-path');
                  var files = $(this)[0].files;
                  var file_names = [];
                  for (var i = 0; i < files.length; i++) {
                    file_names.push(files[i].name);
                  }
                  path_input.val(file_names.join(", "));
                  path_input.trigger('change');
            });


            // search

            $('#search-surat-masuk').keyup(function(){
                $.get({
                    url : '/inbox/search',
                    data : {q :$(this).val() },
                    success : function(data) {
                        $('#view-search').html(data);
                    }

                });
            });
            $('#search-surat-keluar').keyup(function(){
                $.get({
                    url : '/outbox/search',
                    data : {q :$(this).val() },
                    success : function(data) {
                        $('#view-search').html(data);
                    }

                });
            });

            $('#search-user').keyup(function(){
                $.get({
                    url : '/users/search',
                    data : {q :$(this).val() },
                    success : function(data) {
                        $('#view-search').html(data);
                    }

                });
            });
});
