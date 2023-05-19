import json
import sys

from sympy import simplify, N
from sympy.parsing.latex import parse_latex

def compare_expressions(expr1, expr2):
    sympy_expr1 = parse_latex(expr1)
    sympy_expr2 = parse_latex(expr2)
    
    simplified_expr1 = simplify(sympy_expr1)
    simplified_expr2 = simplify(sympy_expr2)

    if not simplified_expr1.equals(simplified_expr2):
        print("First " + str(simplified_expr1) + '\n')
        print("Second " + str(simplified_expr2) + '\n')
        simplified_expr1 = N(simplified_expr1, 4)
        simplified_expr2 = N(simplified_expr2, 4)
        print("\nFirst " + str(simplified_expr1) + '\n')
        print("Second " + str(simplified_expr2) + '\n')
    
    if simplified_expr1.equals(simplified_expr2):
        result = 1
    else:
        result = 0
        
    json_result = json.dumps({"result": result})
    print(json_result)  

expr1 = sys.argv[1]
expr2 = sys.argv[2]    
compare_expressions(expr1, expr2)
