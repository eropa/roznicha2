<template>
    <div>
        <div class="row" v-if="kassir==0">
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
                    <th scope="col">Клиент</th>
                    <th scope="col">Торговая точка</th>
                    <th scope="col">Статус</th>
                    <th scope="col">Заявка</th>
                    <th scope="col">Сумма</th>
                    <th scope="col">Действие</th>
                </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in rasxList">
                       <td>
                           {{item.id}}
                       </td>
                        <td>
                            {{item.date_cr}}
                        </td>
                        <td>
                            {{item.pos}}
                        </td>
                        <td>
                            {{item.point}}
                        </td>
                        <td  v-if="item.status_id=='Касса'">
                            {{item.status_id}}
                        </td>
                        <td v-if="item.status_id!='Касса'">
                            {{item.status_id}}
                            <br>
                            <select @change="onChange($event)" :data-id="item.id">
                                <option :value="0" selected>Выберите статус</option>
                                <option v-for="(status, index) in statuslist">{{status.name}}</option>
                            </select>
                        </td>
                        <td>
                            {{item.zaivka}}
                        </td>

                        <td>
                            {{item.sum_ras}} руб.
                        </td>
                        <td>
                            <a  v-bind:href="'/upanel/print/ras/'+item.id" class="btn-success btn"  role="button">Печать</a>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</template>

<script>
    export default {
        name: "RaslistComponent",
        props: ['kassir','statuslist'],
        data() {
            return {
                data1:null,
                data2:null,
                rasxList:[],
            }
        },
        //    /get/rasxodfound
        methods: {
            // поиск расходов
            foundRecord:function () {
                console.log(this.data1);
                console.log(this.data2);
                axios.post(' /get/rasxodfound', {
                    data1:this.data1,
                    data2:this.data2,
                }).then ((response)=>{
                    this.prixodList=[];
                    this.rasxList=response.data;
                });
            },
            onChange(event) {
                console.log(event.target.value)
                var statusChange=event.target.value;
                var idRecord1 = event.target.getAttribute('data-id');
                if(statusChange==0)
                    return 1;

                axios.post('/upanel/rasxod/changestatus', {
                    'status':statusChange,
                    'idrecord':idRecord1,
                }).then ((response)=>{
                    alert('Статус поменяли')
                });
            }
        },
        created: function () {
            // `this` указывает на экземпляр vm
            axios.post('/get/rasxodtoday').then((response) => {
                console.log(response.data);
                this.rasxList = response.data;
            });
        }
    }

</script>

<style scoped>

</style>
