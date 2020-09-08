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

            <div class="form-group" v-if="tovar['sostav']">
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

                    <tr v-for="item in sostavass">
                        <th scope="row">1*</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>

                    </tbody>
                </table>
            </div>


            <input type="hidden" name="id" >
            <button type="button" class="btn btn-primary" v-on:click="saveData()" >Обновить</button>
        </form>


    </div>
</template>

<script>
    export default {
        name: "EditassComponent",
        props: ['datagrs','data'],
        data() {
            return {
                tovar:null,
                listgroup:[],
                sostavass:[],
                editId:0,
                listtovar:[],
                selectedGroup:0,
                editIdTovar:0,
                newTovar:"",
                newBarCode:"",
            }
        },
        methods: {
            saveData: function () {
                axios.post('/get/saveass', {
                    data:this.data,
                }).then ((response)=>{
                    console.log(response.data);
                    alert('Сохранил');
                });
            },
        },
        created: function() {
            this.listgroup=this.datagrs;
          //  this.selectedGroup=this.data['id'];
            this.tovar=this.data;
           // console.log('start');
           // console.log(this.data);
        },
    }
</script>

<style scoped>

</style>
