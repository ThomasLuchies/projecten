package Chess.Core.Usecases.ListAvailableMoves;

import Chess.Core.Board;
import Chess.Core.Coords;
import Chess.Core.Field;

import java.util.HashSet;

public class ListAvailableKnightMoves extends ListAvailableMoves
{
    @Override
    public HashSet<Coords> list(Board board, Coords location) throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        int x;
        int y;
        HashSet<Coords> availableMoves = new HashSet<>();
        Coords coords;
        var piece = board.getPiece(location);
        for(int n = 0; n < 8; n++)
        {
            y = location.y();
            x = location.x();
            coords = null;
            switch(n)
            {
                //left 2 down 1
                case 0:
                    x -= 2;
                    y--;
                    if(x < 1 || y < 1) break;
                    coords = new Coords(x, y);
                    break;
                //left 1 down 2
                case 1:
                    x--;
                    y -= 2;
                    if(x < 1 || y < 1) break;
                    coords = new Coords(x, y);
                    break;
                //right 1 down 2
                case 2:
                    x++;
                    y -= 2;
                    if(x > 8 || y < 1) break;
                    coords = new Coords(x, y);
                    break;
                //right 2 down 1
                case 3:
                    x += 2;
                    y--;
                    if(x > 8 || y < 1) break;
                    coords = new Coords(x, y);
                    break;
                //left 1 up 2
                case 4:
                    x--;
                    y += 2;
                    if(x < 1 || y > 8) break;
                    coords = new Coords(x, y);
                    break;
                //left 2 up 1
                case 5:
                    x -= 2;
                    y++;
                    if(x < 1 || y > 8) break;
                    coords = new Coords(x, y);
                    break;
                //right 1 up 2
                case 6:
                    x++;
                    y += 2;
                    if(x > 8 || y > 8) break;
                    coords = new Coords(x, y);
                    break;
                //right 2 up 1
                case 7:
                    x += 2;
                    y++;
                    if(x > 8 || y > 8) break;
                    coords = new Coords(x, y);
                    break;
            }

            if (coords != null)
                if (!board.pieceOnField(coords) || isOppositePiece(board, piece.getColor(), coords))
                    availableMoves.add(coords);
        }
        return availableMoves;
    }
}