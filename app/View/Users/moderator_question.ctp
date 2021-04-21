
<section class="section cabinet-section">
    <div class="container">
        <ul class="breadcrumbs">
            <li><a href=""> Главная </a></li>
            <li><a href=""> Личный кабинет </a></li>
        </ul>
        <div class="title">Личный кабинет</div>
        <div class="cabinet-block">
           <?=$this->element('sidebar') ?>

            <div class="links-body">
                <div class="links-title-block">
                    <div class="links-title"><?=$data['Questionnaire']['title_'.$l]?></div>
                </div>
                <div class="links-content padding-0">
                    <?php if(!empty($questions)): ?>
                    <form id="questions" action="/users/modeartoresend" method="POST">
                         <?=$this->Session->flash('bad')?>
                         <input id="signature" type="hidden" name="data[signature]"/>
                        <input type="hidden" name="data[Question][questionnaire_id]"  value="<?=$data['Questionnaire']['id']?>">
                        <a href="/<?=$lang?>users/my_questionnaires" class="before-page padding-st"> 
                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.02734 11.9453C8.30078 11.6719 8.27344 11.2617 8.02734 10.9883L4.71875 7.84375H12.5938C12.9492 7.84375 13.25 7.57031 13.25 7.1875V6.3125C13.25 5.95703 12.9492 5.65625 12.5938 5.65625H4.71875L8.02734 2.53906C8.27344 2.26562 8.30078 1.85547 8.02734 1.58203L7.42578 0.980469C7.17969 0.734375 6.74219 0.734375 6.49609 0.980469L1.19141 6.3125C0.917969 6.55859 0.917969 6.96875 1.19141 7.21484L6.49609 12.5469C6.74219 12.793 7.15234 12.793 7.42578 12.5469L8.02734 11.9453Z" fill="#EF811F"/>
                            </svg>
                            <span>Назад к выбору собрания</span>    
                        </a>
                       

                        <?php foreach ($questions as $key => $item): ?>
                            <div class="oprosnik-inner__item padding-st padding-t-b">
                                <div class="oprosnil__title"><?=$item['Question']['title_'.$l] ?></div>
                                <input type="hidden" name="data[Question][results][q<?=$key+1?>][question]" value="<?=$item['Question']['title_ru'] ?>">
                                <div class="opros-radio">
                                    <label for="q<?=$key?>a1">
                                        <input type="radio" id="q<?=$key?>a1" name="data[Question][results][q<?=$key+1?>][answer]" value="Поддерживаю">
                                        <span>Поддерживаю</span>
                                    </label>
                                    <label for="q<?=$key?>a2">
                                        <input type="radio" id="q<?=$key?>a2" name="data[Question][results][q<?=$key+1?>][answer]" value="Не поддерживаю">
                                        <span>Не поддерживаю</span>
                                    </label>
                                    <label for="q<?=$key?>a3">
                                        <input type="radio" id="q<?=$key?>a3"  name="data[Question][results][q<?=$key+1?>][answer]" value="Воздерживаюсь от голоса">
                                        <span>Воздерживаюсь от голоса</span>
                                    </label>
                                </div>
                                <div class="opros-input" >
                                    <input type="text" name="data[Question][results][q<?=$key+1?>][desc]" placeholder="Добавить комментарий к ответу">
                                </div>
                            </div>
                        <?php endforeach ?>
                        
                       
                            <div class="padding-st">
                                <span id="submit" style="cursor: pointer;" class="opros-btn ">Подписать</span>
                            </div>
               
                    </form>
                    <?php else: ?>
                        <a href="/<?=$lang?>users/my_questionnaires" class="before-page padding-st"> 
                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.02734 11.9453C8.30078 11.6719 8.27344 11.2617 8.02734 10.9883L4.71875 7.84375H12.5938C12.9492 7.84375 13.25 7.57031 13.25 7.1875V6.3125C13.25 5.95703 12.9492 5.65625 12.5938 5.65625H4.71875L8.02734 2.53906C8.27344 2.26562 8.30078 1.85547 8.02734 1.58203L7.42578 0.980469C7.17969 0.734375 6.74219 0.734375 6.49609 0.980469L1.19141 6.3125C0.917969 6.55859 0.917969 6.96875 1.19141 7.21484L6.49609 12.5469C6.74219 12.793 7.15234 12.793 7.42578 12.5469L8.02734 11.9453Z" fill="#EF811F"/>
                            </svg>
                            <span>Назад к выбору собрания</span>    
                        </a>
                            <?php foreach ($results['results'] as $q1): ?>
                                <div class="oprosnik-inner__item padding-st padding-t-b">
                                    <div class="oprosnil__title"> <?=$q1['question'] ?></div>
                                    <div class="questionnaire_inner_unit">
                                        <div class="questionnaire_inner_row">
                                               <?=$q1['answer'] ?>
                                        </div>
                                    </div>
                                    <div class="textarea" ><?=$q1['desc'] ?></div>
                                </div>
                            <?php endforeach ?>
                
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="/ncalayer.js"></script> 
<script>
window.addEventListener("load", function(){
    $.fn.serializeObject = function(){
        var o = {};
        var a = this.serializeArray();
        $.each(a, function() {
            if (o[this.name] !== undefined) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };

    $("#submit").click(function(){
        
        if(webSocket.readyState != webSocket.OPEN){
            if(confirm("Включите NCALayer и нажмите OK")){
                initNcaLayer();
            }
        }
        console.log("Click");
        $("#signature").val("");
        var signData = encodeURI(JSON.stringify($("#questions").serializeObject()));
        signXml("PKCS12", "SIGNATURE", "<root><Document>"+signData+"</Document></root>", postForm);
    });

    window.postForm = function(ev){

        if(ev.code == "200") {
            console.log("Success");
            $("#signature").val(ev.responseObject);
            $("#questions").submit();
        }else{
            alert("Ошибка подписи");
        }
    }

 
    if(webSocket.readyState != webSocket.OPEN){
        initNcaLayer();
    }
    
});

</script>