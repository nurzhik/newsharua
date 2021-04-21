<section class="page gray">
    <div class="container">
        <div class="title title_left">
            <?php if($data['User']['role'] == 'user'): ?>
               Чат с врачом
           <?php else: ?>
                Чат с пациентом
            <?php endif ?>
        </div>

        <div class="chat">
            <div class="doc_list">
                <?php foreach ($users as $item): ?>
                    <div class="res_item doc_item pacient_item">
                        <div class="res_item_left">
                            <div class="res_item_img">
                                <img src="/img/users/<?=$item['User']['img']?>" alt="">
                            </div>
                        </div>
                        <div class="res_item_text">
                            <div class="res_item_name">
                                <span>
                                    <?=$item['User']['id']?> <?=$item['User']['surname']?> <?=$item['User']['name']?>
                                </span>
                                <div class="msg_count">0</div>
                            </div>
                            <div class="text_item">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                            <div class="res_item_time">09:35</div>
                        </div>
                        <a class="res_more active" href="/chats?user=<?=$item['User']['id']?>&to<?=$data['User']['id']?>"><span>Подробнее</span></a>
                    </div>
                <?php endforeach ?>
                
                    <!-- <div class="res_item doc_item pacient_item new_msg">
                        <div class="res_item_left">
                            <div class="res_item_img">
                                <img src="img/doctor_2.png" alt="">
                            </div>
                        </div>
                        <div class="res_item_text">
                            <div class="res_item_name">
                                <span>Улина Марина Евгеньевна</span>
                                <div class="msg_count">2</div>
                            </div>
                            <div class="text_item">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                            <div class="res_item_time">11:11</div>
                        </div>
                        <a class="res_more" href="javascript:;"><span>Подробнее</span></a>
                    </div> -->
                
            </div>
            <div class="chat_block">
                <div class="chat_head pacient_chat_head">
                    <div class="chat_head_doc">
                        <div class="res_item_img">
                            <img src="/img/users/<?=$user_to['User']['img']?>" alt="">
                        </div>
                        <div class="res_item_text">
                            <div class="res_item_name"><?=$user_to['User']['surname']?> <?=$user_to['User']['name']?></div>
                            <div class="res_item_position">
                                <?php if($user_to['User']['role'] == 'user'): ?>
                                    Пациент <?=$user_to['User']['id']?>
                                <?php else: ?>
                                     <?php foreach ($user_to['Specialist'] as $sh ):?>
                                        <?=$sh['title_'.$l]?>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <!-- <a class="video_btn" href="javascript:;"></a> -->
                    <?php if($data['User']['role'] == 'doctor'): ?>
                        <a class="pacient_video_btn yellow_btn" href="javascript:;" data-fancybox data-src="#set_consultation" >Назначить консультацию</a>
                    <?php endif ?>
                </div>
                <div id="chatbody" class="chat_body">
                    <?php foreach ($message as $item): ?>
                        <?php if($item['Message']['from_user'] == $data['User']['id']): ?>
                                <div class="chat_item chat_item_right">
                                    <p><?=$item['Message']['body']?></p>
                                   <div class="chat_item_time"><?php echo $this->Time->format($item['Message']['created'], '%d.%m.%Y', 'invalid'); ?> 
                                        <?php echo $this->Time->format($item['Message']['created'], '%H:%M', 'invalid'); ?>
                                    </div> 
                                </div>
                        <?php else: ?>
                                <div class="chat_item chat_item_left">
                                    <p><?=$item['Message']['body']?></p>
                                    <div class="chat_item_time"><?php echo $this->Time->format($item['Message']['created'], '%d.%m.%Y', 'invalid'); ?> 
                                        <?php echo $this->Time->format($item['Message']['created'], '%H:%M ', 'invalid'); ?></div>
                                </div>
                        <?php endif ?>
                    <?php endforeach ?>
                    <!-- <div class="chat_date">Среда, 16 ноября</div>
                    <div class="chat_item chat_item_right">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <div class="chat_item_time">09:07</div>
                    </div>
                    <div class="chat_item chat_item_right">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <div class="chat_item_time">09:07</div>
                    </div>
                    <div class="chat_item chat_item_left">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <div class="chat_item_time">09:07</div>
                    </div>
                    <div class="chat_item chat_item_right">
                        <p>Lorem ipsum</p>
                        <div class="chat_item_time">09:08</div>
                    </div>
                    <div class="chat_item chat_item_left">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <div class="chat_item_time">09:10</div>
                    </div> -->

                    <div class="chat_date">Сегодня</div>

<!--                    <div class="chat_item chat_item_left">-->
<!--                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>-->
<!--                        <div class="chat_item_time">09:07</div>-->
<!--                    </div>-->
<!--                    <div class="chat_item chat_item_right">-->
<!--                        <p>Lorem ipsum</p>-->
<!--                        <div class="chat_item_time">09:08</div>-->
<!--                    </div>-->
<!--                    <div class="chat_item chat_item_left">-->
<!--                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>-->
<!--                        <div class="chat_item_time">09:10</div>-->
<!--                    </div>-->
                </div>
                <div class="chat_bottom" action="" method="">
                    <label class="chat_file"  id="chat_file" for="chat_file_input"></label>
                    <input id="chat_file_input" type="file" name="" style="display: none;">
                    <textarea id="input" class="chat_message" rows="1" contenteditable="true"  placeholder="Введите сообщение" required></textarea>
                    <input type="hidden" name="is_file"> 
                    <button class="chat_send_btn" ></button>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="popup cabinet_popup" id="set_consultation">
    <div class="cab_form_title">Назначение консультации</div>
    <form class="cab_pop_form" method="POST" action="/chats/send">
        <div class="double_input_block">
            <div class="input_block">
                <div class="input_name">Дата</div>
                <input class="form_input" id="set_date" type="text" name="date" autocomplete="off" required="">
            </div>
            <div class="input_block">
                <div class="input_name">Время</div>
                <input class="form_input" id="set_time" type="text" name="time_reg" autocomplete="off" required="">
            </div>
            <input class="form_input" id="set_date" type="hidden" name="user_from" value="<?=$data['User']['id']?>" autocomplete="off" required="">
            <input class="form_input" id="set_date" type="hidden" name="user_to" value="<?=$user_to['User']['id']?>" autocomplete="off" required="">
        </div>
        <div class="input_block">
            <div class="input_name">Дополнительно</div>
            <textarea class="form_input" rows="3" name="body"></textarea>
        </div>
        <button class="form_btn yellow_btn" type="submit">Назначить консультацию</button>
    </form>
</div>
     <script src="/js/jquery-3.0.0.min.js"></script>
<script>

$(document).ready(function(){
    $('#chat_file_input').on('change', function(e){
            // var input = $('#input');
            // var text = input.val();

      
            


        var type   = ['image/bmp','image/gif','image/jpg','image/jpeg','image/png',"application/pdf", 'application/msword','application/vnd.ms-excel'];
       
        var size   = 524288; // bytes
        var file   = $('#chat_file_input').prop('files')[0];
            console.log(file.type);
        
        if (type.indexOf(file.type) == -1) {
            alert('Type');
            return false;
        } 
        var form_data = new FormData();
        form_data.append('file', file);
        console.log("test");
        if(file) {
            $.ajax({
                url: '/chats/send',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(data){
                    $('.chat_message').val(data);
                   
                    // console.log(data.match(patt));
                }
            });
        }
        

    });
});



    var init = function(){
        var ws = new WebSocket("ws://95.111.254.133:8081/");

        var uid = <?=$data['User']['id']?>;
      
        var chatId = <?=$chat_id?>;
    //"<img src='/img/test/"+php_script_response+"' />"
        ws.onmessage = function(e){
            var message = JSON.parse(e.data);
            var isMy = message.data.from === uid ? true: false;
            var isForMe = message.data.to === uid ? true: false;
            if(isMy){
                $('#chatbody').append('<div class="chat_item chat_item_right"><p>'+message.data.text+'</p><div class="chat_item_time">'+message.data.time+'</div></div>');
            }else if(isForMe){
                $('#chatbody').append('<div class="chat_item chat_item_left"><p>'+message.data.text+'</p><div class="chat_item_time">'+message.data.time+'</div></div>');
            }
        };
        
        $('.chat_send_btn').on('click', function(e){
            var input = $('#input');
            var text = input.val();
            var patt =/\.([0-9a-z]+)(?=[?#])|(\.)(?:[\w]+)$/gmi //any regexp more/less suitable
            var path = text.match(patt);
            console.log(path);
            alert(path);
            // if(text.trim().length>0){
            //     var time = new Date().getHours() + ":" + new Date().getMinutes();
            //     var message  = {"on":"message","data":{"from": uid, "to":chatId, "text":text, "time":time}};
            //     ws.send(JSON.stringify(message));

            //     input.val('');
            // }

            // $.ajax({
            //     type: 'POST',   
            //     url: "/chats/sendmessage",
            //     data: message.data,
            //     beforeSend: function(xhr) {
            //         xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            //     },
            //     success: function(data){
            //         console.log(data);
            //     },
            //     error: function(e) {
            //         alert("Произошла ошибка запроса к серверу, попробуйте выполнить операцию позже или обновить страницу");
            //         console.log(e); //Выводим ошибки, если есть, в консоль
            //     } 
            // })
        });
    };
    setTimeout(init,3000);
</script>