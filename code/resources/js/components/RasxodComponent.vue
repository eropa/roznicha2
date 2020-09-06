<template>
    <div>
        <div class="row">
            <div class="col-md-3">
                <div class="card" style="position: fixed; witdh:100%;">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Клиент</label>
                            <input type="text" class="form-control" v-model="pos.name" readonly>
                        </div>
                        <div class="form-group">
                            <label>Склад</label>
                            <input type="text" class="form-control" v-model="point.name" readonly>
                        </div>
                        <div class="form-group">
                            <label>Сумма</label>
                            <input type="text" class="form-control"  v-model="sum" readonly>
                        </div>
                        <button class="btn btn-success">Создать</button><br><br>
                        <button  class="btn btn-danger" v-on:click="notSave()">Отмена</button>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                          <div class="row">
                                    <div class="col-md-12" v-if="viewBtnMain">
                                        <button type="button" class="btn btn-primary" style="width:100%" v-on:click="showMain()">На главную</button>
                                    </div>

                                  <div class="card col-md-3" style="
                                        margin-right: 5px;
                                        margin-left: 5px;
                                        margin-top: 5px;
                                        margin-bottom: 5px;
                                    "  v-for="(item, index) in listgrass">

                                      <img src="https://img-global.cpcdn.com/recipes/aa5f8ead8c8fab44bf915c22e68db61d8f156a5914a1b3c2389b2b74db36be31/751x532cq70/pitsa-za-5-minut-%D0%BE%D1%81%D0%BD%D0%BE%D0%B2%D0%BD%D0%BE%D0%B5-%D1%84%D0%BE%D1%82%D0%BE-%D1%80%D0%B5%D1%86%D0%B5%D0%BF%D1%82%D0%B0.jpg"
                                           class="card-img-top" alt="..." v-on:click="openGr(item.id)" v-if="item.type==0">
                                      <img src="https://img-global.cpcdn.com/recipes/aa5f8ead8c8fab44bf915c22e68db61d8f156a5914a1b3c2389b2b74db36be31/751x532cq70/pitsa-za-5-minut-%D0%BE%D1%81%D0%BD%D0%BE%D0%B2%D0%BD%D0%BE%D0%B5-%D1%84%D0%BE%D1%82%D0%BE-%D1%80%D0%B5%D1%86%D0%B5%D0%BF%D1%82%D0%B0.jpg"
                                           class="card-img-top" alt="..." v-on:click="addAss(item)" v-if="item.type==1">
                                      <div class="card-body">
                                          <p class="card-title"><b>{{item.name}}</b></p>
                                          <p class="card-text" v-if="item.type">{{item.price}} руб.</p>
                                      </div>
                                  </div>


                          </div>
            </div>
        </div>


        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="myModalAddTovar">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Добавить товар :</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Количество товара : <button class="btn btn-success" v-on:click="miusCount()"> - </button>
                        <input type="text" readonly v-model="countAdd" style="width:80px" >
                        <button class="btn btn-success" v-on:click="addCount()"> + </button>
                        <hr>
                        <button class="btn btn-success" v-if="countAdd>0" v-on:click="addAssRas()">Добавить в расход</button>
                    </div>

                </div>
            </div>
        </div>


    </div>
</template>

<script>
    export default {
        name: "RasxodComponent",
        props: ['pos', 'point','assstart'],
        data() {
            return {

                listrasxod:[],
                pos:0,
                point:0,
                sum:0.00,
                listgrass:[],
                viewBtnMain:0,
                modalData:null,
                countAdd:0,
                selectDataId:0,
            }
        },
        methods: {
            notSave:function () {
                document.location.replace("/upanel/rasxod");
            },
            openGr:function (id) {
                axios.post('/get/rasass', {
                    id:id,
                }).then ((response)=>{
                    this.listgrass=[];
                    response.data.forEach((element)=>{
                            this.listgrass.push({
                                id:element.id,
                                name:element.name,
                                type:1,
                            })
                        }
                    )
                    this.viewBtnMain=1;
                });
            },
            addAss:function (item){
              //  this.modalData=item;
                this.selectDataId=item.id;
                this.countAdd=0;
                $('#myModalAddTovar').modal('show')
            },
            showMain:function () {
                this.listgrass=[];
                this.assstart.forEach((element)=>{
                        this.listgrass.push({
                            id:element.id,
                            name:element.name,
                            type:0,
                        })
                    }
                )
                this.viewBtnMain=0;
            },
            addCount:function(){
                this.countAdd++;
            },
            miusCount:function(){
                this.countAdd--;
            },
            addAssRas:function(){
                // alert( this.selectDataId);
                $('#myModalAddTovar').modal('hide');
            }
        },
        created: function () {
                // `this` указывает на экземпляр vm
                this.assstart.forEach((element)=>{
                    this.listgrass.push({
                            id:element.id,
                            name:element.name,
                            type:0,
                        })
                    }
                )
        }
    }
</script>

<style scoped>

</style>
