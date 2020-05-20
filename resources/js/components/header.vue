<template>
    <div>
         <nav class="navbar navbar-expand navbar-dark bg-dark">
             <router-link class="navbar-brand" to="/">E-Commerce</router-link>
            <div class="nav navbar-nav">
                <router-link active-class="active" exact class="nav-item nav-link" to="/">Home <span class="sr-only">(current)</span></router-link>
                <router-link active-class="active" exact class="nav-item nav-link" to="/second">About <span class="sr-only">(current)</span></router-link>
                <router-link active-class="active" exact class="nav-item nav-link" to="/third">Contact <span class="sr-only">(current)</span></router-link>
            </div>
        </nav>
    </div>
</template>
