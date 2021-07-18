$(document).ready(function () {
    let store = {
        answer1: "",
        answer2: "",
        answer3: "",
        typeProductLink: "",
        productLink: ""
    };

    $(".btn-step-1").click(function () {
        $("#block_1").hide();
        store.answer1 = $(this).attr('ibc-value');
        let urlstat = '/ajax/ibcquiz/ibcQuizSetUserAnswer.php';
        var paramsstat = 'answer=' + encodeURIComponent(store.answer1) +
            '&questionId=' + encodeURIComponent(1) ;

        httpPostWithParams(urlstat,paramsstat)
            .then(
                response =>
                {
                    console.log(`Rejected:${response})`)
                },
                error => {
                    console.log(`Rejected:${error})`)
                });

        let url = '/ajax/ibcquiz/ibcQuizGetAnswersById.php';
        var params = 'answer1=' + encodeURIComponent(store.answer1);
        httpPostWithParams(url,params)
            .then(
                response =>
                {
                    $('.ibc-other-answers').empty();
                    let data = JSON.parse(response);
                    let htmlStr = '';
                    data.answers.forEach(function(item, i, arr) {
                        console.log( i + ": " + item + " (массив:" + arr + ")" );
                        htmlStr = htmlStr + `
                            <div class="block__button btn-step-2" ibc-value="${i}" ibc-prev-answer="${store.answer1}">
                                ${item.ANSWER}
                            </div>
                        `;
                    });

                    $('.ibc-other-answers').append(htmlStr);
                    $("#block_2").show();

                },
                error => {
                    console.log('Rejected:${error})')
                });

    });

    $(document).on("click", ".btn-step-2", function() {
        $("#block_2").hide();
        store.answer2 = $(this).attr('ibc-value');
        let urlstat = '/ajax/ibcquiz/ibcQuizSetUserAnswer.php';
        var paramsstat = 'answer=' + encodeURIComponent(store.answer2) +
            '&questionId=' + encodeURIComponent(2) ;

        httpPostWithParams(urlstat,paramsstat)
            .then(
                response =>
                {
                    console.log(`Rejected:${response})`)
                },
                error => {
                    console.log(`Rejected:${error})`)
                });

        if (store.answer1 =='3'){
            store.typeProductLink = 5;
            let url = '/ajax/ibcquiz/ibcQuizGetLinkByProductType.php';
            var params = 'product=' + encodeURIComponent(store.typeProductLink);
            httpPostWithParams(url,params)
                .then(
                    response =>
                    {
                        let data = JSON.parse(response);
                        store.productLink = data.products[0].PRODUCT;

                        $("#block_end").show();

                    },
                    error => {
                        console.log(`Rejected:${error})`)
                    });
            $("#block_end").show();
        }else{
            $("#block_3").show();
        }
    });

    $(".btn-step-3").click(function () {
        $("#block_3").hide();
        store.answer3 = $(this).attr('ibc-value');
        let urlstat = '/ajax/ibcquiz/ibcQuizSetUserAnswer.php';
        var paramsstat = 'answer=' + encodeURIComponent(store.answer3) +
            '&questionId=' + encodeURIComponent(3) ;

        httpPostWithParams(urlstat,paramsstat)
            .then(
                response =>
                {
                    console.log(`Rejected:${response})`)
                },
                error => {
                    console.log(`Rejected:${error})`)
                });

        if (store.answer1 == '1'){
            if (store.answer3 == '1'){
                store.typeProductLink = 1;
            }else{
                store.typeProductLink = 2;
            }
        }
        if (store.answer1 == '2'){
            if (store.answer3 == '1'){
                store.typeProductLink = 3;
            }else{
                store.typeProductLink = 4;
            }
        }
        let url = '/ajax/ibcquiz/ibcQuizGetLinkByProductType.php';
        var params = 'product=' + encodeURIComponent(store.typeProductLink);
        httpPostWithParams(url,params)
            .then(
                response =>
                {
                    let data = JSON.parse(response);
                    store.productLink = data.products[0].PRODUCT;
                    console.log();

                    $("#block_end").show();

                },
                error => {
                    console.log(`Rejected:${error})`)
                });
    });

    $(".ibc-send-email").click(function () {
        let url = '/ajax/ibcquiz/ibcQuizSendEmail.php';
        var params = 'email=' + encodeURIComponent($(".ibc-send-email-input").val());
        httpPostWithParams(url,params)
            .then(
                response =>
                {
                    console.log(`Rejected:${response})`)

                },
                error => {
                    console.log(`Rejected:${error})`)
                });

    });
    $(document).on("click", ".ibc-btn-link-product", function() {
        document.location.href = store.productLink
    });

    function httpGet(url) {

        return new Promise(function (resolve, reject) {

            var xhr = new XMLHttpRequest();
            var body = 'answer1=' + encodeURIComponent(store.answer1) +
                '&answer2=' + encodeURIComponent(store.answer2) +
                '&answer3=' + encodeURIComponent(store.answer3) +
                '&answer4=' + encodeURIComponent(store.answer4) +
                '&idmodule=' + encodeURIComponent(store.idmodule) +
                '&idblock=' + encodeURIComponent(store.idblock) +
                '&blocktype=' + encodeURIComponent(store.blocktype) +
                '&countpoints=' + encodeURIComponent(store.countpoints);

            xhr.open("POST", url, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function () {
                if (this.status == 200) {
                    resolve(this.response);
                } else {
                    var error = new Error(this.statusText);
                    error.code = this.status;
                    reject(error);
                }
            };

            xhr.onerror = function () {
                reject(new Error("Network Error"));
            };

            xhr.send(body);
        });

    }

    function httpPostWithParams(url,params) {

        return new Promise(function (resolve, reject) {

            var xhr = new XMLHttpRequest();


            xhr.open("POST", url, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function () {
                if (this.status == 200) {
                    resolve(this.response);
                } else {
                    var error = new Error(this.statusText);
                    error.code = this.status;
                    reject(error);
                }
            };

            xhr.onerror = function () {
                reject(new Error("Network Error"));
            };

            xhr.send(params);
        });

    }
});