const {Client} = require('pg')

const client = new Client({
    host: "localhost",
    user: "postgres",
    port: 5432,
    password: 123456,
    database: "msproject"
})

client.connect();

client.query('select * from bands', (err, res)=>{
    if (!err) {
        console.log(res.rows);
    }else{
        console.log(err.message);
    }
    client.end;
})