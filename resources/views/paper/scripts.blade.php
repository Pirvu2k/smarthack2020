<script>
    var specialChars = [
        { text: 'firstName', value: '{firstName}' },
        { text: 'lastName', value: '{lastName}' },
        { text: 'address', value: '{address}' },
        { text: 'phone', value: '{phone}' },
        { text: 'IDN', value: '{IDN}' },
        { text: 'ICSeries', value: '{ICSeries}' },
    ];

    tinymce.init({
        selector: 'textarea#createPaper',
        height: 250,
        setup: function (editor) {
            editor.ui.registry.addAutocompleter('defaultFields', {
                ch: "{",
                minChars: 0,
                columns: 1,
                fetch: function (pattern) {
                    var matchedChars = specialChars.filter(function (char) {
                        return char.text.indexOf(pattern) !== -1;
                    });

                return new tinymce.util.Promise(function (resolve) {
                    var results = matchedChars.map(function (char) {
                        return {
                            value: char.value,
                            text: char.text,
                        }
                    });
                    resolve(results);
                });
                },
                onAction: function (autocompleteApi, rng, value) {
                    editor.selection.setRng(rng);
                    editor.insertContent(value);
                    autocompleteApi.hide();
                }
            });
        },
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });
</script>
