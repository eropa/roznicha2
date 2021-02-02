<template>
    <div>

        <form action="#" method="post" id="formUpdateAss">
            <div class="form-group">
                <label for="inputName">Название</label>
                <input type="text" class="form-control"
                       id="inputName"
                       name="name"
                       v-model="tovar['name']"
                       required
                       placeholder="Название товара.">
            </div>
            <div class="form-group">
                <label for="inputBar">Бар-код товара</label>
                <input type="text" class="form-control"
                       id="inputBar"
                       name="barcode"
                       v-model="tovar['barcode']"
                       required
                       placeholder="Бар-код товара">
            </div>

            <div class="form-group">
                <label for="selectGr">Группа товара</label>
                <select class="form-control" id="selectGr"
                        v-model="tovar['grass_id']"
                >
                    <option  v-for="(item, index) in listgroup" v-bind:value="item.id">{{item.name}}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="selectView">Видимость товара в расходе</label>
                <select class="form-control" id="selectView"
                        v-model="tovar['visible_ras']"
                >
                    <option value="1">Да</option>
                    <option value="0">Нет</option>
                </select>
            </div>
            <div class="form-group">
                <label for="inputPrice">цена</label>
                <input type="text" class="form-control"
                       id="inputPrice"
                       name="barcode"
                       v-model="tovar['price']"
                       required
                       placeholder="Бар-код товара">
            </div>

            <div class="form-group">
                <div class="custom-file">
                    <input type="file"
                           id="file"
                           class="custom-file-input"
                           ref="file" v-on:change="handleFileUpload()"/>
                    <br>
                    <img :src="'/ass_tovar/'+tovar['image']" width="300" v-if="tovar['image']!=null">
                    <label class="custom-file-label" for="file" v-if="tovar['image']!=null">{{tovar['image']}}</label>
                    <label class="custom-file-label" for="file" v-if="tovar['image']==null">Загрузите</label>
                </div>
            </div>
            <br v-if="tovar['image']!=null">
            <br v-if="tovar['image']!=null">
            <br v-if="tovar['image']!=null">
            <br v-if="tovar['image']!=null">
            <br v-if="tovar['image']!=null">
            <br v-if="tovar['image']!=null">

            <div class="form-check">
                <input type="checkbox"
                       class="form-check-input"
                       id="sostav"
                       name="sostav"
                       v-model="tovar['sostav']"
                       value="1">
                <label class="form-check-label" for="sostav">Составной товар( состоить из нескольких элементов)
                </label>
            </div>
            <div class="form-group" v-if="tovar['sostav']">
                <button v-on:click="addsostav()">Добавить +</button>
                <label for="selectGr"><b>Состав</b></label>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Название</th>
                        <th scope="col">Кол-во</th>
                        <th scope="col">Удалить</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr v-for="(item, index)  in sostavass">
                        <th scope="row"> {{item.id}} </th>
                        <td>{{item.name}}</td>
                        <td><input type="number" v-model="item.count"></td>
                        <td>
                            <button  @click="deleteEvent(index)">
                                удалить
                            </button>
                            </td>
                    </tr>

                    </tbody>
                </table>
            </div>



            <div class="form-group">
                <label >Описание товара</label>
                <ckeditor v-model="editorData">
                </ckeditor>
            </div>




            <input type="hidden" name="id" >
            <button type="button" class="btn btn-primary" v-on:click="saveData()" >Обновить</button>
        </form>
        <!-- Modal -->
        <div class="modal fade"
             id="idShowToavar"
             tabindex="-1"
             role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ассортимент</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Поиск <input type="text" v-model="foundText"><button v-on:click="foundTovar()">Поиск</button>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Название</th>
                                <th scope="col">действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="item_found in listfound">
                                <th scope="row">{{item_found.id}}</th>
                                <td>{{item_found.name}}</td>
                                <td><button v-on:click="finishaddsosta(item_found.id,item_found.name)">+</button></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</template>

<script>
    export default {
        name: "EditassComponent",

        props: ['datagrs','data','arrasostav'],
        data() {
            return {
                tovar:null,
                listgroup:[],
                sostavass:[],
                editId:0,
                listtovar:[],
                editorData:'',
                selectedGroup:0,
                editIdTovar:0,
                newTovar:"",
                newBarCode:"",
                image_ass:null,
                foundText:"",
                listfound:[],
            }
        },
        methods: {
            // Соxранить данные
            saveData: function () {
                let formData = new FormData();
                formData.append('file', this.image_ass);
                formData.append('editorData',this.editorData);
                formData.append('sostavass',JSON.stringify(this.sostavass) );
                console.log(this.sostavass);
                for (const [key, value] of Object.entries(this.data)) {
                    formData.append(key,value);
                }
                axios.post('/get/saveass',formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                        }
                    }
                    ).then ((response)=>{
                    console.log(response.data);
                    alert('Сохранил');
                });
            },
            //Предворительно показывает картинку
            handleFileUpload: function (){
                this.image_ass = this.$refs.file.files[0];
                console.log(this.image_ass);
                console.log(this.$refs.file.files[0]);
            },
            // Показать модальноое окно с товаром
            addsostav:function(){
                $('#idShowToavar').modal('show')
                event.preventDefault();
            },
            //поиск товара в базе по названию
            foundTovar: function() {
                this.listfound=[];
                axios.post('/get/assortiment', {
                    foundText: this.foundText,
                }).then ((response)=>{
                    this.listfound=response.data;
                    console.log(response.data);
                });
            },
            //Добовляем в состав
            finishaddsosta:function(id,name){
                $('#idShowToavar').modal('hide');
                this.sostavass.push({id:id,name:name,count:0.00});
             },
            // удалить позицию
            deleteEvent: function(index){
                this.sostavass.splice(index, 1);
                event.preventDefault(); event.preventDefault();
            },
        },
        //При создане получаем данные
        created: function() {
            this.listgroup=this.datagrs;
            this.tovar=this.data;
            this.sostavass=this.arrasostav;
            this.editorData=this.tovar['html_about'];
            console.log(this.data);
        },
    }
</script>

<style scoped>

</style>
