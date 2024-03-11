import axios from "axios";

const urlAPI = "http://localhost:8000/api";


export const getDestinations = async (page) => {
  try {
    const response = await axios.get(`${urlAPI}/destinations?page=${page}`);

    return response.data;
  } catch (error) {
    throw error.response.data;
  }
};

export const registerUser = async (userData) => {
  try {
    const response = await axios.post(`${urlAPI}/register`, userData);
    return response.data;
  } catch (error) {
    throw error.response.data;
  }
};

export const loginUser = async (userData) => {
  try {
    const response = await axios.post(`${urlAPI}/login`, userData);
    return response.data;
  } catch (error) {
    throw error.response.data;
  }
};

export const createDestination = async (destinationData) => {
  try {
    const response = await axios.post(`${BASE_URL}/destinations`, destinationData);
    return response.data;
  } catch (error) {
    throw error.response.data;
  }
};

export const updateDestination = async (destinationId, destinationData) => {
  try {
    const response = await axios.post(`${BASE_URL}/destinations/${destinationId}`, destinationData);
    return response.data;
  } catch (error) {
    throw error.response.data;
  }
};

// delete destination 

export const deleteDestination = async (destinationId) => {
  try {
    const response = await axios.delete(`${urlAPI}/destinations/${destinationId}`);
    return response.data;
  } catch (error) {
    throw error.response.data;
  }
};
