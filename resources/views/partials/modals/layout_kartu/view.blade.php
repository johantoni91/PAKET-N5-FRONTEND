<div id="view{{ $item['id'] }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-5 w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    {{ $item['title'] }}
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="view{{ $item['id'] }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 space-y-4">
                <div id="gjs" style="height:0px; overflow:hidden">
                    {!! $item['content'] !!}
                </div>
            </div>
            <div id="blocks"></div>
            <script type="text/javascript">
                const projectId = "{{ $item['id'] }}"
                const loadProjectEndpoint = `http://localhost:8001/api/kartu/${projectId}/load-kartu`;
                const storeProjectEndpoint = `http://localhost:8001/api/kartu/${projectId}/store-kartu`;

                window.editor = grapesjs.init({
                    height: '100%',
                    container: '#gjs',
                    fromElement: true,
                    showOffsets: true,

                    selectorManager: {
                        componentFirst: true
                    },
                    storageManager: {
                        type: 'remote',
                        stepsBeforeSave: 1,
                        options: {
                            remote: {
                                urlLoad: loadProjectEndpoint,
                                urlStore: storeProjectEndpoint,
                                fetchOptions: opts => (opts.method === 'POST' ? {
                                    method: 'PATCH'
                                } : {}),
                                onStore: data => ({
                                    id: projectId,
                                    data
                                }),
                                onLoad: result => result.data,
                            }
                        }
                    },
                    styleManager: {
                        sectors: [{
                            name: 'General',
                            properties: [{
                                    extend: 'float',
                                    type: 'radio',
                                    default: 'none',
                                    options: [{
                                            value: 'none',
                                            className: 'fa fa-times'
                                        },
                                        {
                                            value: 'left',
                                            className: 'fa fa-align-left'
                                        },
                                        {
                                            value: 'right',
                                            className: 'fa fa-align-right'
                                        }
                                    ],
                                },
                                'display',
                                {
                                    extend: 'position',
                                    type: 'select'
                                },
                                'top',
                                'right',
                                'left',
                                'bottom',
                            ],
                        }, {
                            name: 'Dimension',
                            open: false,
                            properties: [
                                'width',
                                {
                                    id: 'flex-width',
                                    type: 'integer',
                                    name: 'Width',
                                    units: ['px', '%'],
                                    property: 'flex-basis',
                                    toRequire: 1,
                                },
                                'height',
                                'max-width',
                                'min-height',
                                'margin',
                                'padding'
                            ],
                        }, {
                            name: 'Typography',
                            open: false,
                            properties: [
                                'font-family',
                                'font-size',
                                'font-weight',
                                'letter-spacing',
                                'color',
                                'line-height',
                                {
                                    extend: 'text-align',
                                    options: [{
                                            id: 'left',
                                            label: 'Left',
                                            className: 'fa fa-align-left'
                                        },
                                        {
                                            id: 'center',
                                            label: 'Center',
                                            className: 'fa fa-align-center'
                                        },
                                        {
                                            id: 'right',
                                            label: 'Right',
                                            className: 'fa fa-align-right'
                                        },
                                        {
                                            id: 'justify',
                                            label: 'Justify',
                                            className: 'fa fa-align-justify'
                                        }
                                    ],
                                },
                                {
                                    property: 'text-decoration',
                                    type: 'radio',
                                    default: 'none',
                                    options: [{
                                            id: 'none',
                                            label: 'None',
                                            className: 'fa fa-times'
                                        },
                                        {
                                            id: 'underline',
                                            label: 'underline',
                                            className: 'fa fa-underline'
                                        },
                                        {
                                            id: 'line-through',
                                            label: 'Line-through',
                                            className: 'fa fa-strikethrough'
                                        }
                                    ],
                                },
                                'text-shadow'
                            ],
                        }, {
                            name: 'Decorations',
                            open: false,
                            properties: [
                                'opacity',
                                'border-radius',
                                'border',
                                'box-shadow',
                                'background', // { id: 'background-bg', property: 'background', type: 'bg' }
                            ],
                        }, {
                            name: 'Extra',
                            open: false,
                            buildProps: [
                                'transition',
                                'perspective',
                                'transform'
                            ],
                        }, {
                            name: 'Flex',
                            open: false,
                            properties: [{
                                name: 'Flex Container',
                                property: 'display',
                                type: 'select',
                                defaults: 'block',
                                list: [{
                                        value: 'block',
                                        name: 'Disable'
                                    },
                                    {
                                        value: 'flex',
                                        name: 'Enable'
                                    }
                                ],
                            }, {
                                name: 'Flex Parent',
                                property: 'label-parent-flex',
                                type: 'integer',
                            }, {
                                name: 'Direction',
                                property: 'flex-direction',
                                type: 'radio',
                                defaults: 'row',
                                list: [{
                                    value: 'row',
                                    name: 'Row',
                                    className: 'icons-flex icon-dir-row',
                                    title: 'Row',
                                }, {
                                    value: 'row-reverse',
                                    name: 'Row reverse',
                                    className: 'icons-flex icon-dir-row-rev',
                                    title: 'Row reverse',
                                }, {
                                    value: 'column',
                                    name: 'Column',
                                    title: 'Column',
                                    className: 'icons-flex icon-dir-col',
                                }, {
                                    value: 'column-reverse',
                                    name: 'Column reverse',
                                    title: 'Column reverse',
                                    className: 'icons-flex icon-dir-col-rev',
                                }],
                            }, {
                                name: 'Justify',
                                property: 'justify-content',
                                type: 'radio',
                                defaults: 'flex-start',
                                list: [{
                                    value: 'flex-start',
                                    className: 'icons-flex icon-just-start',
                                    title: 'Start',
                                }, {
                                    value: 'flex-end',
                                    title: 'End',
                                    className: 'icons-flex icon-just-end',
                                }, {
                                    value: 'space-between',
                                    title: 'Space between',
                                    className: 'icons-flex icon-just-sp-bet',
                                }, {
                                    value: 'space-around',
                                    title: 'Space around',
                                    className: 'icons-flex icon-just-sp-ar',
                                }, {
                                    value: 'center',
                                    title: 'Center',
                                    className: 'icons-flex icon-just-sp-cent',
                                }],
                            }, {
                                name: 'Align',
                                property: 'align-items',
                                type: 'radio',
                                defaults: 'center',
                                list: [{
                                    value: 'flex-start',
                                    title: 'Start',
                                    className: 'icons-flex icon-al-start',
                                }, {
                                    value: 'flex-end',
                                    title: 'End',
                                    className: 'icons-flex icon-al-end',
                                }, {
                                    value: 'stretch',
                                    title: 'Stretch',
                                    className: 'icons-flex icon-al-str',
                                }, {
                                    value: 'center',
                                    title: 'Center',
                                    className: 'icons-flex icon-al-center',
                                }],
                            }, {
                                name: 'Flex Children',
                                property: 'label-parent-flex',
                                type: 'integer',
                            }, {
                                name: 'Order',
                                property: 'order',
                                type: 'integer',
                                defaults: 0,
                                min: 0
                            }, {
                                name: 'Flex',
                                property: 'flex',
                                type: 'composite',
                                properties: [{
                                    name: 'Grow',
                                    property: 'flex-grow',
                                    type: 'integer',
                                    defaults: 0,
                                    min: 0
                                }, {
                                    name: 'Shrink',
                                    property: 'flex-shrink',
                                    type: 'integer',
                                    defaults: 0,
                                    min: 0
                                }, {
                                    name: 'Basis',
                                    property: 'flex-basis',
                                    type: 'integer',
                                    units: ['px', '%', ''],
                                    unit: '',
                                    defaults: 'auto',
                                }],
                            }, {
                                name: 'Align',
                                property: 'align-self',
                                type: 'radio',
                                defaults: 'auto',
                                list: [{
                                    value: 'auto',
                                    name: 'Auto',
                                }, {
                                    value: 'flex-start',
                                    title: 'Start',
                                    className: 'icons-flex icon-al-start',
                                }, {
                                    value: 'flex-end',
                                    title: 'End',
                                    className: 'icons-flex icon-al-end',
                                }, {
                                    value: 'stretch',
                                    title: 'Stretch',
                                    className: 'icons-flex icon-al-str',
                                }, {
                                    value: 'center',
                                    title: 'Center',
                                    className: 'icons-flex icon-al-center',
                                }],
                            }]
                        }],
                    },
                    plugins: [
                        'gjs-blocks-basic',
                        'grapesjs-plugin-forms',
                        'grapesjs-component-countdown',
                        'grapesjs-plugin-export',
                        'grapesjs-tabs',
                        'grapesjs-custom-code',
                        'grapesjs-touch',
                        'grapesjs-parser-postcss',
                        'grapesjs-tooltip',
                        'grapesjs-tui-image-editor',
                        'grapesjs-typed',
                        'grapesjs-style-bg',
                        'grapesjs-preset-webpage',
                        'grapesjs-navbar',
                    ],
                    pluginsOpts: {
                        'gjs-blocks-basic': {
                            flexGrid: true
                        },
                        'grapesjs-tui-image-editor': {
                            config: {
                                includeUI: {
                                    initMenu: 'filter',
                                },
                            },
                        },
                        'grapesjs-tabs': {
                            tabsBlock: {
                                category: 'Extra'
                            }
                        },
                        'grapesjs-typed': {
                            block: {
                                category: 'Extra',
                                content: {
                                    type: 'typed',
                                    'type-speed': 40,
                                    strings: [
                                        'Text row one',
                                        'Text row two',
                                        'Text row three',
                                    ],
                                }
                            }
                        },
                        'grapesjs-preset-webpage': {
                            modalImportTitle: 'Import Template',
                            modalImportLabel: '<div style="margin-bottom: 10px; font-size: 13px;">Paste here your HTML/CSS and click Import</div>',
                            modalImportContent: function(editor) {
                                return editor.getHtml() + '<style>' + editor.getCss() + '</style>'
                            },
                        },
                    },
                });

                function renderHTML() {
                    const PAGE_CONTENTS = [{
                        tagName: 'h1',
                        type: 'text',
                        components: [{
                            type: 'textnode',
                            removable: false,
                            draggable: false,
                            highlightable: 0,
                            copyable: false,
                            selectable: true,
                            content: 'Dit is een test!',
                            _innertext: false,
                        }, ],
                    }, ]
                    const editor = grapesjs.init({
                        headless: true
                    })
                    const components = editor.addComponents(PAGE_CONTENTS)
                    const html = components.map(cmp => cmp.toHTML()).join('')
                    console.log('Rendered HTML is ', html)
                }

                renderHTML()
            </script>
        </div>
    </div>
</div>
