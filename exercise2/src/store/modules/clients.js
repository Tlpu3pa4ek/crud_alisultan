import axios from "axios";
export default {
    actions:{
        async fetchClients(ctx){
            const res = await fetch('http://127.0.0.1:8000/api/clients/getInfo');
            const clients = await res.json();
            ctx.commit('showClients', clients);
        },
        async postData(context, jsonData) {
            try {
                const response = await axios.post('http://127.0.0.1:8000/api/clients/create-clients', jsonData, {
                    headers: {
                        'Content-Type': 'application/json'
                    }
                });
                return response.data;
            } catch (error) {
                console.error('Error posting JSON data:', error);
                throw error;
            }
        },
        async putData(context, id, payload) {
            try {
                const response = await axios.put(`http://127.0.0.1:8000/api/clients/update-clients/${id}`, payload); // Отправка PUT запроса на сервер
                return response.data; // Возвращение данных ответа
            } catch (error) {
                console.error('Error putting data:', error);
                throw error; // Обработка ошибки или перехват ее для дальнейшей обработки
            }
        },
        async deleteData(context, id) {
            try {
                const response = await axios.delete(`/api/data/${id}`); // Отправка DELETE запроса на сервер
                return response.data; // Возвращение данных ответа
            } catch (error) {
                console.error('Error deleting data:', error);
                throw error; // Обработка ошибки или перехват ее для дальнейшей обработки
            }
        }
    },
    mutations:{
        showClients(state, clients){
            state.clients = clients
        },
        createClient(state, newClient) {
            state.client.unshift(newClient)
        },
        openModal(state, isOpen) {
            state.isModalOpen = isOpen;
        }
    },
    state:{
        clients: [],
        products: [],
    },
    getters:{
        allClients(state){
            return state.clients
        }
    },
}