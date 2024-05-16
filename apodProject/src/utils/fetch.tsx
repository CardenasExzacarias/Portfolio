//Necesario colocar un api_key proporcionado desde el sitio web https://api.nasa.gov/
const API_KEY = "";
const API_URL = "https://api.nasa.gov/planetary/apod";

export default async (urlParams?: string) => {
  try {
    const res = await fetch(
      `${API_URL}?api_key=${API_KEY}${
        typeof urlParams != "undefined" && urlParams?.length > 0
          ? urlParams
          : ""
      }`
    );

    const data = await res.json();

    return Promise.resolve(data);
  } catch (error) {
    return Promise.reject(error);
  }
};
