
export function setUser(state, user) {
    state.user.data = user;
}

export function setToken(state, token) {
    state.user.token = token;
    if (token) {
        sessionStorage.setItem('TOKEN', token);
    } else {
        sessionStorage.removeItem('TOKEN')
    }
}

export function setProducts(state, [loading, data = null]) {
    if (data) {
        state.products = {
            ...state.products, // const arr2 = [...arr1, 4, 5];  // arr2 sẽ là [1, 2, 3, 4, 5]
            data: data.data,
            links: data.meta.links,
            page: data.meta.current_page,
            limit: data.meta.per_page,
            from: data.meta.from,
            to: data.meta.to,
            total: data.meta.total,
        }
    }
    state.products.loading = loading;
}
