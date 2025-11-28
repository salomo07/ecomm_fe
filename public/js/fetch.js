export function apiFetch(url, raw = {}, type, token) {
    return new Promise(async (resolve, reject) => {
        const myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");

        if (token) {
            myHeaders.append("Authorization", "Bearer " + token);
        }

        let opt = { method: type, headers: myHeaders };

        if (type !== "GET" && type !== "HEAD") {
            opt.body = raw;
        }

        try {
            const response = await fetch(url, opt);

            if (!response.ok) {
                const errData = await response.text();
                return reject({
                    status: response.status,
                    message: "Request failed",
                    data: errData
                });
            }

            const result = await response.json();
            resolve(result);

        } catch (error) {
            reject({
                message: "Network error",
                error: error
            });
        }
    });
}