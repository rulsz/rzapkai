import express from "express";
import fetch from "node-fetch";

const app = express();
const PORT = process.env.PORT || 3000;

app.get("/chat", async (req, res) => {
  // ambil teks dari ?msg=...
  const msg = req.query.msg || "Halo";

  try {
    const response = await fetch("https://open-ai21.p.rapidapi.com/conversationllama", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "x-rapidapi-host": "open-ai21.p.rapidapi.com",
        "x-rapidapi-key": process.env.RAPIDAPI_KEY
      },
      body: JSON.stringify({
        messages: [
          {
            role: "user",
            content: msg   // isi dari URL query
          }
        ],
        web_access: null
      })
    });

    const data = await response.json();
    res.json(data); // balikin langsung ke client
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
});

app.listen(PORT, () => {
  console.log(`Server running on port ${PORT}`);
});
