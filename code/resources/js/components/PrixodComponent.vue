<template>
    <div>
        <div class="row">
            <div class="col-md-3">
                <form>
                    <div class="form-group">
                        <label for="listPos">Поставщик</label>
                        <select class="form-control" id="listPos" v-model="selectPos">
                            <option value="0">Выберите из списка</option>
                            <option  v-for="(item, index) in listpos" v-bind:value="item.id" >{{item.name}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="listPoints">Торговая точка</label>
                        <select class="form-control" id="listPoints" v-model="selectSklad">
                            <option value="0">Выберите торговую точку</option>
                            <option  v-for="(item, index) in listpoints" v-bind:value="item.id" >{{item.name}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputRasxod">Расход</label>
                        <input class="form-control" type="text" id="inputRasxod" placeholder="#9999 22/02/2020" v-model="strRas">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" v-model="setOplata">
                        <label class="form-check-label" for="exampleCheck1">Оплачен</label>
                    </div>
                    <button type="button" class="btn btn-primary" v-on:click="createPrih" v-if="visibleBtnCreate">Создать</button>
                </form>
                <hr>
                Итого зак.руб -{{sumTovar1}}<br>
                Итого прод.руб -{{sumTovar2}}<br>

            </div>
            <div class="col-md-9">
                <button type="button" class="btn btn-primary"
                        v-on:click="clearTovarFound()"
                        data-toggle="modal" data-target="#dataAddModal">
                    +
                </button>

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">бар-код</th>
                        <th scope="col">название</th>
                        <th scope="col">Кол-во</th>
                        <th scope="col">цена зак.</th>
                        <th scope="col">итого.</th>
                        <th scope="col">цена прод.</th>
                        <th scope="col">итого.</th>
                        <th scope="col">-</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr  v-for="(item, index) in prixodToavar.slice().reverse()">
                        <th scope="row">{{item.pos}}</th>
                        <td>{{item.barcode}}</td>
                        <td>{{item.name}}</td>
                        <td>
                            <input type="number" class="form-control" v-model="item.counttovar" style="width: 105px">
                        </td>
                        <td>
                            <input type="number" class="form-control" v-model="item.zakryb"  style="width: 95px">
                        </td>
                        <td>{{(item.zakryb*item.counttovar).toFixed(2)}}</td>
                        <td>
                            <input type="number" class="form-control" v-model="item.prodryb"  style="width: 95px">
                        </td>
                        <td>{{(item.prodryb*item.counttovar).toFixed(2)}}</td>
                        <td><button>-</button></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="dataAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ассортимент</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-2">
                                    Поиск
                            </div>
                            <div class="col-md-6">
                                <input class="form-control form-control-lg col-md-12"
                                       v-model="foundText"
                                       type="text" placeholder="">
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-primary" v-on:click="foundTovar()">Поиск</button>
                            </div>

                        </div>
                        <div class="row">
                            <select class="form-control" id="exampleFormControlSelect2"
                                    multiple
                                    v-model="selectFoundTovar" >
                                 <option v-for="(item, index) in listaddpos"
                                         v-bind:value="item.id" >
                                     {{item.id}} | {{item.barcode}} | {{item.name}}
                                 </option>
                            </select>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" v-on:click="selectAddTovar" class="btn btn-primary">Добавить</button>
                    </div>
                </div>
            </div>
        </div>



    </div>
</template>

<script>
    export default {
        name: "PrixodComponent",
        props: ['listpoints','listpos'],
        data() {
            return {
                listaddpos:[],
                foundText:"",
                selectFoundTovar:[],
                prixodToavar:[],
                countItem:0,
                sumTovar1:0.00,
                sumTovar2:0.00,
                selectPos:0,
                selectSklad:0,
                setOplata:0,
                strRas:"",
                visibleBtnCreate:1,
            }
        },
        methods: {

            // очситка
            clearTovarFound:function(){
                this.listaddpos=[];
            },

            //Добавить товат в список
            selectAddTovar:function(){
                ///get/assid
                axios.
                post('/get/assid', {
                    id: this.selectFoundTovar,
                }).then ((response)=>{
                    let dataItem=response.data[0];
                    this.countItem++;
                    this.prixodToavar.push(
                        {
                            pos: this.countItem,
                            id:dataItem.id,
                            barcode:dataItem.barcode,
                            name:dataItem.name,
                            counttovar:0.000,
                            zakryb:0.00,
                            zakutog:0.00,
                            prodryb:dataItem.price,
                            produtogo:0.00,
                        }
                    );
                    $('#dataAddModal').modal('hide');
                    console.log(response.data[0]);
                });


            },
            // Список товара
            foundTovar: function() {
                this.listaddpos=[];
                axios.post('/get/assortiment', {
                    foundText: this.foundText,
                }).then ((response)=>{
                    this.listaddpos=response.data;
                    console.log(response.data);
                });
            },
            createPrih:function () {
                //this.visibleBtnCreate=0;
                axios.post('/set/prixod', {
                    selectPos:this.selectPos,
                    selectSklad:this.selectSklad,
                    setOplata:this.setOplata,
                    prixodToavar:this.prixodToavar,
                    strRas:this.strRas,
                }).then ((response)=>{
                    alert("Приход сделан");
                    document.location.replace("/upanel/prixod");
                });

            }
        },
        updated:  function() {
            var tempSum1=0.00;
            var tempSum2=0.00;
            this.prixodToavar.forEach(function(item){
                tempSum1=tempSum1+item.counttovar*item.zakryb;
                tempSum2=tempSum2+item.counttovar*item.prodryb;
            });
            this.sumTovar1=tempSum1.toFixed(2);
            this.sumTovar2=tempSum2.toFixed(2);
        },

    }
</script>

<style scoped>

</style>
