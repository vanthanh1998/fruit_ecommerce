import axiosClient from "../axios";

export function getUser({commit}, data) {
    return axiosClient.get('/user', data)
        .then(({data}) => {
            commit('setUser', data);
            return data;
        })
}

export function login({commit}, data) {
    return axiosClient.post('/login', data)
        .then(({data}) => {
            commit('setUser', data.user);
            commit('setToken', data.token)
            return data;
        })
}

export async function logout({commit}) {
    try {
        return await axiosClient.post('/logout')
            .then((response) => {
                commit('setToken', null)
                return response;
            })
    } catch (error) {
        throw error;
    }
}

export async function getProducts({commit, state}, {url = null, search = '', per_page, sort_field, sort_direction}) {
    commit('setProducts', [true]); // mutation: setProducts(state, [loading, data = null])  => loading = true
    url = url || '/products';
    try {
        const response = await axiosClient.get(url, {
            params: {search, per_page, sort_field, sort_direction}
        });

        commit('setProducts', [false, response.data]);
        return response.data;
    } catch (error) {
        console.error("Error fetching products:", error);
        commit('setProducts', [false]);
        throw error;
    }
}

export async function createProduct({commit}, product) {
    try {
        if (product.image instanceof File) {
            const form = new FormData();
            form.append('title', product.title);
            form.append('image', product.image);
            form.append('description', product.description);
            form.append('price', product.price);
            product = form;
        }
        return await axiosClient.post('/products', product)
    } catch (error) {
        throw error;
    }
}
