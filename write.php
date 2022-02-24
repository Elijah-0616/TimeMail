<?php require_once './header.php'; ?>
    <!-- 引入 css -->
    <link href="https://cdn.jsdelivr.net/npm/@wangeditor/editor@latest/dist/css/style.css" rel="stylesheet">

    <!-- 引入 js -->
    <script src="https://cdn.jsdelivr.net/npm/@wangeditor/editor@latest/dist/index.min.js"></script>


    <style>
        /*编辑器自适应高度*/
        #w-e-textarea-1 {
            min-height: 180px;
        }
        .w-e-text-container {
            min-height: 180px;
        }
        #status {
            color: #999;
        }
        #messages {
            margin-top: -25px;
            margin-left: 88%;
            color: #999;
        }
    </style>

    <div class="mdui-container doc-container">
        <div class="mdui-typo">
            <h2>写信</h2>
            <div class="mdui-textfield">
                <input id="time" time="time" class="mdui-textfield-input" type="date" />
            </div>
            <div class="mdui-textfield">
                <input id="topic" time="topic"
                       placeholder="一封来自<?php echo date("Y") . "年" . date("m") . "月" . date("d") . "日的信件" ?>"
                       class="mdui-textfield-input" type="text" />
            </div>
            <!-- z-index全屏 -->
            <div class="mdui-textfield" style="z-index:10000">
                <div id="toolbar-container"></div>
                <div id="editor-container"></div>
                <div id="status"></div>
                <div id="messages"></div>
                <textarea id="content" style="display:none"></textarea>
            </div>
            <div class="mdui-textfield">
                <input id="email" time="email" class="mdui-textfield-input" type="text" placeholder="收信邮箱" />
            </div>
            <br>
            <button onClick="Submit();" id="Submit" class="mdui-btn mdui-btn-dense mdui-color-theme-accent mdui-ripple"><i
                        class="mdui-icon material-icons">near_me</i>
            </button>
        </div>
    </div>

    <script>
        const E = window.wangEditor; // 全局变量
        //【注意】下面使用的 typescript 语法。如用 javascript 语法，把类型去掉即可。
        const editorConfig = {
            MENU_CONF: {}
        }
        editorConfig.scroll = false
        editorConfig.placeholder = '愿未来不负所期<br/>你想对未来的自己说点什么？？？'
        editorConfig.MENU_CONF['uploadImage'] = {
            server: 'https://img.ce1estial.tech/api/index.php',

            // 插入base64编码的图片
            // base64LimitSize: 10 * 1024 * 1024, // 10M 以下插入 base64
            fieldName: 'image',
            meta: {
                token: '14762617e2f38bbbedf27fb7b94a94cd',
            },

            // 上传之前触发
            onBeforeUpload(file) {
                //  files 选中的文件列表，格式如 { key1: file1, key2: file2 }
                return file

                // 返回值可选择：
                // 1. 返回一个对象（files 或者 files 的一部分），则将上传返回结果中的文件
                // 2. 返回 false ，终止上传
            },
            // 上传进度的回调函数
            onProgress(progress) {
                // progress 是 0-100 的数字
                // console.log('progress', progress)
                document.getElementById('messages').innerHTML = `${progress}%`
            },
            //TODO: 以下回调函数无法执行，暂未知原因,文档地址：https://www.wangeditor.com/v5/guide/menu-config.html#%E6%9C%8D%E5%8A%A1%E7%AB%AF%E5%9C%B0%E5%9D%80
            // FIXME: 单个文件上传成功之后
            onSuccess(file, res) {
                // console.log(`${file.name} 上传成功`, res)
                document.getElementById('messages').innerHTML = `${file.name}上传成功 ${res.result}`
            },
            // FIXME: 单个文件上传失败
            onFailed(file, res) {
                console.log(`${file.name} 上传失败`, res)
            },
            // FIXME: 上传错误，或者触发 timeout 超时
            onError(file, err, res) {
                console.log(`${file.name} 上传出错`, err, res)
            },

            // 自定义插入图片
            customInsert(res, insertFn) {
                // res 即服务端的返回结果
                if(res.result == "success") {
                    // 从 res 中找到 url ，然后插图图片
                    var url = res.url
                    insertFn(url)
                }

            }

        }

        //编辑器内容、选区变化时的回调函数
        editorConfig.onChange = (editor) => {
            document.getElementById("messages").innerHTML = ` `
            // 网页结构导致div的内容无法被识别，此代码将div的内容实时同步至textarea
            const html = editor.getHtml()
            document.getElementById('content').innerHTML = html

            // 编辑器状态显示代码，字数统计等
            const selectionText = editor.getSelectionText()
            const text = editor.getText()

            if (selectionText.length == 0) {
                document.getElementById("status").innerHTML = `${text.length}个字`
            } else {
                document.getElementById("status").innerHTML = `${selectionText.length}/${text.length}个字`
            }
        }

        //编辑器创建时的回调函数
        editorConfig.onCreated = (editor) => {
            console.log("editor created")

        }


        // 创建编辑器
        const editor = E.createEditor({
            selector: '#editor-container',
            config: editorConfig,
            mode: 'simple' // 或 'simple'
        })
        // 创建工具栏
        const toolbar = E.createToolbar({
            editor,
            selector: '#toolbar-container',
            mode: 'simple' // 或 'simple'
        })
    </script>


    <div class="mdui-typo">
        <blockquote>
            <div class="mdui-typo-title-opacity">注意事项:</div>
            <p>
                寄出的信是不可撤回的，也不可查找,希望你也忘掉这件事,直到你收到信的那一天。<br />
                同时在投递的那一刻我们将向你的邮箱发送一封确认邮件,只有点击确认邮件中的链接,您才能在未来收到邮件.<br />
                请记得将services-no-reply@ce1estial.tech加入邮箱白名单,以防收不到信<br />
                更多请访问菜单栏中的关于页面
            </p>
        </blockquote>
    </div>

    <!-- 加载 -->
    <div id='loading'
         style="position: absolute;margin: auto;top: 0;left: 0;right: 0;bottom: 0;display: none;width: 50px;height: 50px"
         class="mdui-spinner mdui-spinner-colorful"></div>

    <script>
        function Submit() {
            var $ = mdui.JQ;

            $.showOverlay(); //遮罩
            $('#loading').show();

            $.ajax({
                method: 'POST',
                url: './submit.php',
                timeout: 10000,
                data: {
                    time: $('#time').val(),
                    content: $('#content').val(),
                    email: $('#email').val(),
                    topic: $('#topic').val()
                },
                success: function(data) {
                    if (data == 200) {
                        mdui.dialog({
                            title: '投递成功..',
                            content: '我们已经向您的邮箱发送了一封验证邮件,请在1小时内点击邮箱内的验证链接,这样在未来您才会收到信件哦!',
                            modal: true
                        });
                    } else {
                        mdui.snackbar({
                            message: '发送失败<br/>原因:' + data,
                            position: 'right-top',
                        });
                    }
                },
                complete: function(xhr, status) {
                    setTimeout(function() {
                        $.hideOverlay();
                    }, 100); //移除遮罩
                    $('#loading').hide();
                    if (status == 'timeout') {
                        mdui.snackbar({
                            message: '请求超时...',
                            position: 'right-top',
                        });
                    }
                }
            });
        }
    </script>
    <br />
    </body>
<?php require_once './footer.php'; ?>