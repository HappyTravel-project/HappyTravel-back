import React from 'react';
import { render, fireEvent } from '@testing-library/react';
import LoginUser from './LoginUser';
import axios from 'axios'; 
jest.mock('axios'); // para controlar las respuestas

// SetSessionCookie simulado ya que no se usa directamente en el renderizado
jest.mock('../src/app/utils/sessionsUtils.js');

// Respuesta de la API
test('should handle successful login and redirect', async () => {
  const mockResponse = { status: 200, data: { data: { access_token: 'mock-token' } } };
  axios.post.mockResolvedValueOnce(mockResponse);

// Renderisionamiento del componente LoginU
  const { getByRole, getByText } = render(<LoginUser />);

//optienes los input
  const emailInput = getByRole('textbox', { name: /email/i });
  const passwordInput = getByRole('textbox', { name: /password/i });
  const submitButton = getByRole('button', { name: /acceptar/i });

// completar las entradas las contraseñas y enviar el formulario
  fireEvent.change(emailInput, { target: { value: 'test@example.com' } });
  fireEvent.change(passwordInput, { target: { value: 'password' } });
  fireEvent.click(submitButton);

  await waitFor(() => {
    expect(axios.post).toHaveBeenCalledWith('http://localhost:8000/api/login', {
      email: 'test@example.com',
      password: 'password',
    });

    // Comprobar si se configuró la cookie de sesión
    expect(setSessionCookie).toHaveBeenCalledWith('mock-token');
    expect(window.location.pathname).toBe('/admin/dashboard'); // Expect redirecion
  });
});
