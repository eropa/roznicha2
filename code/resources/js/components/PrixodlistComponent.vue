<template>
    <div>
        <div class="row">
            <form>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="datas">Дата С</label>
                        <input type="date" class="form-control" id="datas"  required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="datapo">Дата ПО</label>
                        <input type="date" class="form-control" id="datapo" >
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="dataoplatu">Дата оплаты</label>
                        <input type="date" class="form-control" id="dataoplatu">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4">
                        <label for="pos">Поставщик</label>
                        <select class="form-control" id="pos" v-model="selectPos">
                            <option value="0">Выберите из списка</option>
                            <option  v-for="(item, index) in listpos" v-bind:value="item.id" >{{item.name}}</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="sklad">Склад</label>
                        <select class="form-control" id="sklad" v-model="selectSklad">
                            <option value="0">Выберите торговую точку</option>
                            <option  v-for="(item, index) in listpoints" v-bind:value="item.id" >{{item.name}}</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <br>
                        <button class="btn btn-primary" type="button">Поиск</button>
                    </div>
                </div>


            </form>
        </div>
        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Дата</th>
                    <th scope="col">Дата опл.</th>
                    <th scope="col">Поставщик</th>
                    <th scope="col">Склад</th>
                    <th scope="col">Действие</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(item, index) in prixodList">
                    <td>
                        {{item.id}}
                    </td>
                    <td>
                        {{item.dataprixod}}
                    </td>
                    <td>
                        {{item.datapay}}
                    </td>
                    <td>
                        {{item.pos_name}}
                    </td>
                    <td>
                        {{item.point_name}}
                    </td>
                    <td>
                        Печать
                        /
                        <button v-on:click="deleteRecord(index,item.id)">Удалить</button>

                        /
                        Редактировать
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PrixodlistComponent",
        props: ['listpoints', 'listpos'],
        data() {
            return {
                strRas: "",
                selectSklad: 0,
                selectPos: 0,
                prixodList: [],
            }
        },
        methods: {
            // очситка
            deleteRecord: function (pos_id,prix_id) {
                this.listaddpos=[];
                axios.post('/delete/prix', {
                    pos_id:pos_id,
                    prix_id:prix_id,
                }).then ((response)=>{
                    this.prixodList.splice(pos_id, 1);
                    // this.listaddpos=response.data;
                    console.log(response.data);
                    alert('Запись удалена');
                });
            }
        },
        created: function () {
            // `this` указывает на экземпляр vm
            axios.post('/get/prix1').then((response) => {
                this.prixodList = response.data;
            });
        }
    }
</script>

<style scoped>

</style>
