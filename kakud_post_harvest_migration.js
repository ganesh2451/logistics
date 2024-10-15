// Connect to your MongoDB instance
const { MongoClient } = require('mongodb');
const uri = "mongodb+srv://ganeshami55555:PNJXpRXkyNmRDPPg @cluster0.9mv0o.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0";
const client = new MongoClient(uri);

async function run() {
  try {
    await client.connect();
    const db = client.db('kakud_post_harvest');

    // Insert into admin_dashboard
    await db.collection('admin_dashboard').insertMany([
      {
        action: "some action",
        driver_name: "darsh",
        driver_phone: "55111151511",
        booking_id: 1,
        timestamp: new Date("2024-07-20T20:50:00Z")
      }
    ]);

    // Insert into admin_login
    await db.collection('admin_login').insertMany([
      { email: "kanishkms49@gmail.com", password: "123" }
    ]);

    // Insert into admin_register
    await db.collection('admin_register').insertMany([
      { email: "kanishkms49@gmail.com", name: "abc", password: "123" },
      { email: "abc1@gmail.com", name: "abc", password: "123" }
    ]);

    // Insert into booking
    await db.collection('booking').insertMany([
      { date: new Date("2024-07-02"), address_pickup: "shimoga", address_drop: "bangalore", size_of_product: "300" },
      { date: new Date("2024-07-10"), address_pickup: "shimoga", address_drop: "bangalore", size_of_product: "300" },
      { date: new Date("2024-07-09"), address_pickup: "shimoga", address_drop: "mandya", size_of_product: "400" },
      { date: new Date("2024-07-04"), address_pickup: "shimoga", address_drop: "mysore", size_of_product: "250" }
    ]);

    // Insert into user_login
    await db.collection('user_login').insertMany([
      { email: "kanishkms49@gmail.com", password: "123" }
    ]);

    // Insert into user_register
    await db.collection('user_register').insertMany([
      { email: "kanishkms49@gmail.com", name: "abc", phone_number: "123", password: "$2y$10$cN251hpiFPzO6BZJTnmQt.cyCU.7Kz/2RBKKDn1x5RZGdmi31UpW." }
    ]);

    // Insert into vehicle
    await db.collection('vehicle').insertMany([
      { driver_name: "darsh", driver_phone: "55111151511", vehicle_name: "sdfa", vehicle_plate: "sdfsdf", capacity: "333", vehicle_image: "images/images.jpeg" }
    ]);

    console.log("Data inserted successfully");
  } finally {
    await client.close();
  }
}

run().catch(console.dir);
