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
                            <input type="text" class="form-control"  v-model="sumRas" readonly>
                        </div>
                        <button class="btn btn-success" v-on:click="showRas">Создать</button><br><br>
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
                                        backgroundColor:#ccffff;
                                    "  v-for="(item, index) in listgrass" v-if="item.type==0">

                                      <img v-bind:src="'/groups/' + item.image"
                                           class="card-img-top" alt="..." v-on:click="openGr(item.id)" v-if="item.type==0">
                                      <div class="card-body">
                                          <p class="card-title"><b>{{item.name}}</b></p>
                                          <p class="card-text" v-if="item.type">{{item.price}} руб.</p>
                                      </div>
                                  </div>

                                  <div class="card col-md-3" style="
                                            margin-right: 5px;
                                            margin-left: 5px;
                                            margin-top: 5px;
                                            margin-bottom: 5px;
                                        "  v-for="(item, index) in listgrass" v-if="item.type==1">
                                      <img  v-bind:src="'/ass_tovar/' + item.image"
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


        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="myModalRasxod">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" >Расход</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">№</th>
                                    <th scope="col">Название</th>
                                    <th scope="col">кол-во</th>
                                    <th scope="col">цена</th>
                                    <th scope="col">Итого</th>
                                    <th scope="col">Удалить</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(item, index) in listrasxod">
                                    <td>
                                        {{index+1}}
                                    </td>
                                    <td>
                                        {{item.name}}
                                    </td>
                                    <td>
                                        {{item.count}}
                                    </td>
                                    <td>
                                        {{item.price}}
                                    </td>
                                    <td>
                                        {{item.sum}}
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger" v-on:click="deletItemRas(index)">-</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <hr>
                            <h5>ИТОГО : <b>{{sumRas}}</b> </h5><br>
                            <button type="button" class="btn btn-secondary" v-on:click="saveRas()">Оплата</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="myUsrOplata">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Результат оплаты</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Оплата прошла успешна
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
                sumRas:0.00,
                listgrass:[],
                viewBtnMain:0,
                modalData:null,
                countAdd:0,
                selectDataId:0,
                selectData:null,
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
                    console.log(response.data);

                    this.listgrass=[];
                    response.data.forEach((element)=>{
                            this.listgrass.push({
                                id:element.id,
                                name:element.name,
                                price:element.price,
                                image:element.image,
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
                this.selectData=item;
                this.countAdd=0;
                $('#myModalAddTovar').modal('show')
            },

            showMain:function () {
                this.listgrass=[];
                this.assstart.forEach((element)=>{
                        this.listgrass.push({
                            id:element.id,
                            name:element.name,
                            image:element.image,
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

                var newAss=1;
                this.listrasxod.forEach((item)=>{
                        if(item.id==this.selectData.id){
                            newAss=0
                            item.count=item.count+this.countAdd;
                            item.sum=(item.count*this.selectData.price).toFixed(2);
                        }
                    }
                );
                if(newAss==1){
                    // Добовляем новый товар в строчку
                    this.listrasxod.push({
                        id:this.selectData.id,
                        name:this.selectData.name,
                        count:this.countAdd,
                        price:this.selectData.price,
                        sum:(this.countAdd*this.selectData.price).toFixed(2),
                    })
                }
                var tempSum=0.00;
                this.listrasxod.forEach(function(item){
                   tempSum=tempSum+Number(item.sum);
                });
                this.sumRas=tempSum.toFixed(2);
                $('#myModalAddTovar').modal('hide');

            },

            showRas:function () {
                $('#myModalRasxod').modal('show')
            },

            deletItemRas:function (index) {
                this.listrasxod.splice(index, 1)
                var tempSum=0.00;
                this.listrasxod.forEach(function(item){
                    tempSum=tempSum+Number(item.sum);
                });
                this.sumRas=tempSum.toFixed(2);
            },

            saveRas:function(){
                axios.post('/set/addrasxod', {
                    selectPos:this.pos,
                    selectSklad:this.point,
                    listrasxod:this.listrasxod,
                }).then ((response)=>{
                    $('#myModalRasxod').modal('hide');
                    $('#myUsrOplata').modal('show')
                    document.location.replace("/upanel/rasxod");
                });


            },

            createRas:function () {
                //this.visibleBtnCreate=0;


            }

        },
        created: function () {
                // `this` указывает на экземпляр vm
                this.assstart.forEach((element)=>{
                    this.listgrass.push({
                            id:element.id,
                            name:element.name,
                            image:element.image,
                            type:0,
                        })
                    }
                )
        },
    }
</script>

<style scoped>

</style>
