<template>
    <div>
        <div class="row">
            <form>
                <div class="form-row">
                    <div class="col-md-6 mb-6">
                        <label for="datas">Дата С</label>
                        <input type="date" class="form-control" id="datas" v-model="data1" >
                    </div>
                    <div class="col-md-6 mb-6">
                        <label for="datapo">Дата ПО</label>
                        <input type="date" class="form-control"  v-model="data2" id="datapo" >
                    </div>

                    <button class="btn btn-primary" type="button" v-on:click="foundRecord()">Поиск</button>

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
                        <a  v-bind:href="'/upanel/print/pri/'+item.id" class="btn-success btn"  role="button">Печать</a>
                        <a  v-bind:href="'/upanel/prixod/edit/'+item.id" class="btn-warning btn"  role="button">Ред.</a>
                        <a  v-bind:href="'/upanel/prixod/delete/'+item.id" class="btn-danger btn"  role="button">Удал.</a>
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
                data1:null,
                data2:null,
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
            },
            // поиск приходов
            foundRecord:function () {
                console.log(this.data1);
                console.log(this.data2);
                axios.post('/found/prix', {
                    data1:this.data1,
                    data2:this.data2,
                }).then ((response)=>{
                    this.prixodList=[];
                    this.prixodList=response.data;
                });
            },
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
