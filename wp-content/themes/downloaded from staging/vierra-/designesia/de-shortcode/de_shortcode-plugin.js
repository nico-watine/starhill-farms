(function() {
    tinymce.PluginManager.add('designesia', function( editor, url ) {
        editor.addButton( 'designesia', {
            title: 'DE Shortcode',
            type: 'menubutton',
            icon: 'icon de_icon',
            menu: [
                {
                    text: 'Alert',
                    value: '[de_alert style="alert-success, alert-info, alert-warning, alert-danger" message="Your message here" icon=""]',
                    onclick: function() {
                        editor.insertContent(this.value());
                    }
                },
				{
                    text: 'Animated Progress Bar',
                    value: '[de_progress title="Bar Title" percentage="(0-100)" color="#888888" style="1"]',
                    onclick: function() {
                        editor.insertContent(this.value());
                    }
                },
				{
                    text: 'Button',
                    value: '[btn title="btn-title" style="btn-default,btn-primary,btn-success,btn-info,btn-warning,btn-danger,btn-link" size="default,btn-lg,btn-sm,btn-xs" url="your-url" icon=""]',
                    onclick: function() {
                        editor.insertContent(this.value());
                    }
                },
                {
                    text: 'Column',
                    value: '',
                    onclick: function() {
                        editor.insertContent(this.value());
                    },
                    menu: [
                        {
                            text: '1/2',
                            value: '[one_half]...[/one_half]',
                            onclick: function(e) {
                                e.stopPropagation();
                                editor.insertContent(this.value());
                            }       
                        },
                        {
                            text: '1/3',
                            value: '[one_third]...[/one_third]',
                            onclick: function(e) {
                                e.stopPropagation();
                                editor.insertContent(this.value());
                            }       
                        },
						{
                            text: '1/4',
                            value: '[one_fourth]...[/one_fourth]',
                            onclick: function(e) {
                                e.stopPropagation();
                                editor.insertContent(this.value());
                            }       
                        },
						{
                            text: '2/3',
                            value: '[two_third]...[/two_third]',
                            onclick: function(e) {
                                e.stopPropagation();
                                editor.insertContent(this.value());
                            }       
                        },
						{
                            text: '3/4',
                            value: '[three_fourth]...[/three_fourth]',
                            onclick: function(e) {
                                e.stopPropagation();
                                editor.insertContent(this.value());
                            }       
                        },
                    ]
                },
                {
                    text: 'Divider',
                    value: '[divider style="none, div-single, div-double, div-triple, div-triple-dashed, div-triple-dotted, div-quad, div-dotted, div-dashed" full="yes"]',
                    onclick: function() {
                        editor.insertContent(this.value());
                    },
					
                },
				{
                    text: 'Featured Box',
                    value: '[featured][f_title]...title here...[/f_title][f_pic]...image here...[/f_pic][f_content]...content here...[/f_content][/featured]',
                    onclick: function() {
                        editor.insertContent(this.value());
                    },
					
                },
				{
                    text: 'Gallery',
                    value: '[de_gallery category="" count=""]',
                    onclick: function() {
                        editor.insertContent(this.value());
                    },
					
                },
				{
                    text: 'Icon',
                    value: '[de_icon icon="fa-heart" color="#FFFFFF" size="small,medium,large" style="none,circle,rounded" bgcolor="#555555" border=""]',
                    onclick: function() {
                        editor.insertContent(this.value());
                    },
					
                },
				{
                    text: 'Tab',
                    value: '[de_tab][tab_item label="My Tab 1" active="yes"]...tab content here...[/tab_item]\n[tab_item label="My Tab 2"]...tab content here...[/tab_item]\n[tab_item label="My Tab 3"]...tab content here...[/tab_item]\n[/de_tab]',
                    onclick: function() {
                        editor.insertContent(this.value());
                    },
					
                },
				{
                    text: 'Testimonial',
                    value: '[de_testi review="..." name="..." company="..." photo=""]',
                    onclick: function() {
                        editor.insertContent(this.value());
                    },
					
                },
				{
                    text: 'Video Youtube',
                    value: '[youtube url=http://www.youtube.com/embed/video_id]',
                    onclick: function() {
                        editor.insertContent(this.value());
                    },
					
                },
				{
                    text: 'Video Vimeo',
                    value: '[vimeo url=http://player.vimeo.com/video/video_id]',
                    onclick: function() {
                        editor.insertContent(this.value());
                    },
					
                },
           ]
        });
    });
})();